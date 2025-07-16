<?php

use App\Http\Controllers\TopicController;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Psy\Formatter\DocblockFormatter;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("hierarcical/data/{id}", [TopicController::class, 'getTopicQuestions']);
Route::get("hello", function () {
    return "this time its gonna be diffrent than it ever was3";
});

Route::get("topics", function () {
    return Topic::all();
});
Route::post("store/topic", [TopicController::class, 'store']);

// auto question craetor for each topic
Route::post("store/question", [TopicController::class, 'storeSomeQuestionForEachTopic']);
