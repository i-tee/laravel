@extends('app')

@section('title', 'calc395')

@section('content')
    
{!! Calc395\Calc395::getCalcStyle() !!}
{!! Calc395\Calc395::getCalcTmplHtml() !!}

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

{!! Calc395\Calc395::getLangJSON() !!}
{!! Calc395\Calc395::getScriptTag() !!}
    
@endsection