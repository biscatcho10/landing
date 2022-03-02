<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$setting['seo_title']}}</title>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="description" content="{{$setting['seo_description']}}">
    <meta name="keywords" content="{{$setting['seo_keywords']}}">
    {!! $setting['google_analytics'] !!}
    {!! $setting['facebook_pixel'] !!}
    {!! $setting['google_tag_manager_head'] !!}
</head>
<body>
{!! $setting['google_tag_manager_body'] !!}
<div id="root"></div>
<script src="{{asset("js/app.js")}}"></script>
</body>
</html>
