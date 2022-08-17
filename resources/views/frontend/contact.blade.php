@extends('frontend.layout.app')
@section('second_navbar')
    @include('frontend.partials.second_navbar')
@endsection
@section('main_section')

<section class="ls_py-40">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form class="ls_contact-form">
                    <h1>Get in touch!</h1>
                    <ul class="ls_p-0">
                    <li>
                        <div class="grid grid-2">
                            <input type="text" placeholder="Name" required>  
                            <input type="email" placeholder="Email" required>
                        </div>
                    </li>
                    <li>
                        <div class="grid grid-2">
                            <input type="tel" placeholder="Phone">
                            <input type="text" placeholder="Website">
                        </div>
                    </li>    
                    <li>
                        <textarea placeholder="Message"></textarea>
                    </li>  
                    <li>
                        <div class="grid grid-3">
                        <div class="required-msg">REQUIRED FIELDS</div>
                        <button class="btn-grid" type="submit">SUBMIT</button> 
                        </div>
                    </li>    
                    </ul>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>

@endsection