@extends('layouts.signIn-base')

@section('title', 'SignIn as Admin')

@section('form_action', route('signIn.user.authenticate', ['isAdmin' => true]))

@section('custom_link', route('signIn.user'))

@section('custom_link_label', 'SignIn as User')

@section('background_url', asset('img/bgpal.png'))

@section('bg-position-y', '45%')