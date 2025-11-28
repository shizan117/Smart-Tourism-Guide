@extends('frontend.layouts.master')

@section('title', 'FAQ - Smart Tourism Guide')

@section('content')

    <section class="page-header bg-primary text-white py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Frequently Asked Questions 🤔</h1>
            <p class="lead">Find quick answers to the most common questions about our smart tourism platform.</p>
        </div>
    </section>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center mb-5">
                    <h2 class="fw-bold mb-3 section-title">Platform Information & Features</h2>
                </div>

                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header" id="faqHeading1">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="false" aria-controls="faqCollapse1">
                                What is Smart Tourism Guide and how does it work?
                            </button>
                        </h2>
                        <div id="faqCollapse1" class="accordion-collapse collapse" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Smart Tourism Guide is an intelligent tourism platform that uses AI to personalize your travel experience. It analyzes your preferences, travel history, and real-time data to recommend attractions, activities, dining options, and efficient routes tailored just for you.</p>
                                <p class="mb-0">Our platform integrates with various data sources to provide up-to-date information on opening hours, ticket availability, and crowd levels to optimize your itinerary.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header" id="faqHeading2">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                                Is Smart Tourism Guide free to use?
                            </button>
                        </h2>
                        <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Yes! The core features of Smart Tourism Guide are completely free. This includes personalized recommendations, basic itinerary planning, and access to our interactive maps.</p>
                                <p class="mb-0">We offer premium subscriptions for advanced features like offline navigation, exclusive deals, priority customer support, and detailed analytics of your travel patterns.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header" id="faqHeading3">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                                How does the personalization feature work?
                            </button>
                        </h2>
                        <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Our AI learns from your interactions with the platform. When you indicate your interests (history, adventure, food, etc.) and interact with recommendations (saving, liking, or skipping suggestions), the system refines its understanding of your preferences to provide increasingly accurate suggestions.</p>
                                <p class="mb-0">The more you use the platform, the better it becomes at predicting what you'll enjoy, creating a truly personalized travel experience.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header" id="faqHeading4">
                            <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                                Can I use Smart Tourism Guide without an internet connection?
                            </button>
                        </h2>
                        <div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faqHeading4" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Yes, you can download your itineraries, saved places, and maps for offline use. This is especially useful when traveling to areas with limited connectivity.</p>
                                <p class="mb-0">However, real-time features like live navigation, current wait times, and updated availability will require an internet connection. Premium subscribers get enhanced offline capabilities.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 bg-light mt-5">
                    <div class="card-body text-center p-4">
                        <h3 class="fw-bold mb-3">Still need help? 🤷‍♀️</h3>
                        <p class="mb-3">Can't find the answer you're looking for? Reach out to our dedicated support team!</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Contact Our Support Team</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .page-header {
            background: linear-gradient(135deg, #2a9d8f 0%, #1d7870 100%);
        }

        .accordion-button:not(.collapsed) {
            color: #2a9d8f;
            background-color: rgba(42, 157, 143, 0.05);
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.125);
        }

        .accordion-button:focus {
            box-shadow: 0 0 0 0.25rem rgba(42, 157, 143, 0.25);
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
