<!DOCTYPE html>
<html>
@extends('layout.app')
@section('head')
    @parent
    
@endsection

<body>
    @section('nav') 
        @parent
    @endsection

    @section('content')
        @parent
        


        
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>