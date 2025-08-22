<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Home', [
        'welcomeText' => 'Salom, bu Home sahifasi 🚀',
    ]);
})->name('home');

Route::get('/about', function () {
    return Inertia::render('About', [
        'aboutText' => 'Bu About sahifasi — Inertia link ishlayapti ✅',
    ]);
})->name('about');
