<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        // $request->session()->regenerate();
        $user = $request->user();
        $user->tokens()->delete();
        $token = $user->createToken('api-token');
        // info($user);
        $role = $user->role;

        // * as reference
        // $basket = $user->basket->basket_products;

        // $basketProducts = $user->basket->basket_products;

        // $products = $basketProducts->map(function ($basketProduct) {
        //     return [
        //         $basketProduct->products->category,
        //         $basketProduct->products->brand,
        //         $basketProduct->products->info,
        //         $basketProduct->products->image,
        //     ];
        // })->flatten();

        $basketProducts = $user->basket->basket_products;

        $categories = $basketProducts->pluck('products.category');
        $brands = $basketProducts->pluck('products.brand');
        $infos = $basketProducts->pluck('products.info');
        $images = $basketProducts->pluck('products.image');

        // Собираем все в один массив
        $productsDetails = $categories->zip($brands, $infos, $images);

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken,
            'role' => $role,
            'basket' => $productsDetails,

        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
