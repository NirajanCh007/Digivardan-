@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container py-5">
    <h2 class="text-primary fw-bold mb-4">Contact Us</h2>
    <div class="row">
        <div class="col-md-6">
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" id="name" class="form-control" placeholder="John Doe">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" id="email" class="form-control" placeholder="you@example.com">
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" id="subject" class="form-control" placeholder="Subject here...">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea id="message" rows="5" class="form-control" placeholder="Type your message here..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
        <div class="col-md-6">
            <h5 class="fw-bold">Our Office</h5>
            <p class="text-muted">123 Health Ave,<br>Wellness City, 56789</p>
            <p><strong>Email:</strong> support@healthcareapp.com</p>
            <p><strong>Phone:</strong> +1 234 567 890</p>
            <iframe class="w-100 rounded" height="250" style="border:0" loading="lazy"
                src="https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY&q=Wellness+City">
            </iframe>
        </div>
    </div>
</div>
@endsection
