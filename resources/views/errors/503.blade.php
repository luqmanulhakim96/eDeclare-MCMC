@extends('errors::layout')

@section('title', __('Service Unavailable'))
@section('code', '')
@section('message', __($exception->getMessage() ?: 'Service Unavailable'))
