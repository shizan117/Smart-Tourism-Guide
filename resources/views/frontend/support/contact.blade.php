@extends('frontend.layouts.master')

@section('title', 'Contact Us - Smart Tourism Guide')

@section('content')

    <section class="page-header bg-primary text-white py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Get in Touch 📞</h1>
            <p class="lead">Reach out to our support team for personalized assistance with your travel plans.</p>
        </div>
    </section>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center mb-5">
                    <h2 class="fw-bold mb-3 section-title">Speak to our Support Team</h2>
                </div>

                <div class="row">
                    <div class="col-lg-5 mb-4 mb-lg-0">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <h4 class="fw-bold mb-4">Contact Information</h4>

                                <div class="d-flex mb-4">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="fas fa-envelope fs-5"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fw-semibold mb-1">Email Us</h5>
                                        <p class="mb-1">support@smarttourismguide.com</p>
                                        <small class="text-muted">We'll respond within 24 hours</small>
                                    </div>
                                </div>

                                <div class="d-flex mb-4">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="fas fa-phone fs-5"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fw-semibold mb-1">Call Us</h5>
                                        <p class="mb-1">+1 (555) 123-TOUR</p>
                                        <small class="text-muted">Mon-Fri, 9am-6pm EST</small>
                                    </div>
                                </div>

                                <div class="d-flex mb-4">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="fas fa-comments fs-5"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fw-semibold mb-1">Live Chat</h5>
                                        <p class="mb-1">Available 24/7 for urgent issues</p>
                                        <small class="text-muted">Access via our app or homepage</small>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="fas fa-map-marker-alt fs-5"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fw-semibold mb-1">Visit Our Office</h5>
                                        <p class="mb-1">123 Travel Street, Suite 500</p>
                                        <small class="text-muted">New York, NY 10001, USA</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h4 class="fw-bold mb-4">Send us a Message</h4>
                                <form action="" method="POST" id="contactForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label fw-semibold">Full Name *</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label fw-semibold">Email Address *</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="subject" class="form-label fw-semibold">Subject *</label>
                                        <select class="form-select" id="subject" name="subject" required>
                                            <option value="" selected disabled>Select a topic</option>
                                            <option value="technical">Technical Issue</option>
                                            <option value="billing">Billing Question</option>
                                            <option value="suggestion">Feature Suggestion</option>
                                            <option value="partnership">Partnership Inquiry</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label fw-semibold">Message *</label>
                                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="privacyConsent" required>
                                        <label class="form-check-label" for="privacyConsent">
                                            I agree to the <a href="{{ route('privacy') }}">Privacy Policy</a> and consent to the processing of my personal data.
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg w-100">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Simple validation check (already handled by 'required', but good practice)
                    let isValid = contactForm.checkValidity();

                    if (isValid) {
                        // In a real application, replace this with an AJAX call to your Laravel backend
                        alert('Thank you for your message! We will get back to you soon.');
                        contactForm.reset();
                    } else {
                        // Fallback for browsers not showing native validation messages
                        alert('Please fill out all required fields and consent to the Privacy Policy.');
                    }
                });
            }
        });
    </script>
@endpush

@push('styles')
    <style>
        .page-header {
            background: linear-gradient(135deg, #2a9d8f 0%, #1d7870 100%);
        }

        .btn-primary {
            background-color: #2a9d8f;
            border-color: #2a9d8f;
        }

        .btn-primary:hover {
            background-color: #1d7870;
            border-color: #1d7870;
        }

        .section-title {
            color: #2a9d8f;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem !important;
        }
    </style>
@endpush
