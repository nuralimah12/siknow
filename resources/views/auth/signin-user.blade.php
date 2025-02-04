@extends('layouts.signIn-base')

@section('title', 'SignIn as User')

@section('form_action', route('signIn.user.authenticate'))

@section('custom_link', route('signIn.admin'))

@section('custom_link_label', 'SignIn as Admin')

@section('background_url', asset('img/bgpal.png'))

@section('bg-position-y', '45%')