@extends('errors::layout')

@section('title', __('Forbidden'))
@section('code', '')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
