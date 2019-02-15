@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <form action="{{ route('email.add') }}" type="get">
            <input type="email" name="email">
            <input type="hidden" name="user_name" value="{{ $user->nickname }}">
            <input type="hidden" name="qq_id" value="{{ $user->id }}">
            <button type="submit">关联邮件</button>
        </form>
    </div>
@stop