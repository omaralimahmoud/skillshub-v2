@extends('website.layouts.main')

@section('title')
    contact Us
@endsection


@section('content')
    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('assets/website/images/page-background.jpg') }})"></div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="{{ route('website.index') }}">{{ __('website.global.home') }}</a></li>
                        <li>{{ __('website.global.contact') }}</li>
                    </ul>
                    <h1 class="white-text">{{ __('website.pages.contact.get_in_touch') }}</h1>

                </div>
            </div>
        </div>

    </div>
    <!-- /Hero-area -->

    <!-- Contact -->
    <div id="contact" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- contact form -->
                <div class="col-md-6">
                    <div class="contact-form">
                        <h4>{{ __('website.pages.contact.send_a_message') }}</h4>
                        @include('website.pages.errors.ajax-error')
                        <form id="contact-form">
                            @csrf
                            <input id="name" class="input" type="text" name="name" placeholder="{{ __('website.global.name') }}">
                            <input id="email" class="input" type="email" name="email" placeholder="{{ __('website.global.email') }}">
                            <input id="subject" class="input" type="text" name="subject" placeholder="{{ __('website.pages.contact.subject') }}">
                            <textarea id="body" class="input" name="body" placeholder="{{ __('website.pages.contact.enter_your_message') }}"></textarea>
                            <button id="contact-form-button" type="submit" class="main-button icon-button pull-right">{{ __('website.pages.contact.send_message') }}</button>
                        </form>
                    </div>
                </div>
                <!-- /contact form -->

                <!-- contact information -->
                <div class="col-md-5 col-md-offset-1">
                    <h4>{{ __('website.pages.contact.contact_information') }}</h4>
                    <ul class="contact-details">

                        <li><i class="fa fa-envelope"></i>{{ $email->value }}</li>

                        <li><i class="fa fa-phone"></i>{{ $phone->value }}</li>

                    </ul>

                </div>
                <!-- contact information -->

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Contact -->
@endsection
@push('scripts')
    <script>
        $('#success-div').hide()
        $('#errors-div').hide()
        $('#contact-form-button').click(function(e) {
            $('#success-div').hide()
            $('#errors-div').hide()
            $('#success-div').empty()
            $('#errors-div').empty()
            e.preventDefault()
            let formData = new FormData($('#contact-form')[0]);

            $.ajax({
                type: "POST",
                url: "{{ route('website.contact.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(data) {
                    $('#success-div').show()
                    $('#success-div').text(data.success)

                },

                error: function(xhr, status, error) {
                    $('#errors-div').show()
                    $.each(xhr.responseJSON.errors, function(key, item) {
                        $('#errors-div').append("<p>" + item + "</p>")
                    });
                },

            })

            $('#name').val('')
            $('#email').val('')
            $('#subject').val('')
            $('#body').val('')
        })
    </script>
@endpush
