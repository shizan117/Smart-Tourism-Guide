@extends('frontend.layouts.master')

@section('title', 'Privacy Policy - Smart Tourism Guide')

@section('content')
    <section class="page-header bg-primary text-white py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Privacy Policy 🔒</h1>
            <p class="lead">This policy details how Smart Tourism Guide collects, uses, and protects your personal data.</p>
        </div>
    </section>

    <div class="container py-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-lg-5 p-4">
                <p class="text-muted text-end mb-4">Effective Date: {{ date('F j, Y') }}</p>

                <div class="privacy-content">
                    <h2 class="section-title mt-4">1. Introduction</h2>
                    <p>Smart Tourism Guide ("we," "our," or "us") is committed to protecting the privacy of our users. This Privacy Policy applies to our website and related services (collectively, the "Service") and governs our data collection and usage practices.</p>

                    <h2 class="section-title mt-5">2. Information We Collect</h2>
                    <p>We collect various types of information for various purposes to provide and improve our Service to you.</p>

                    <h3 class="mt-4">2.1. Personal Data</h3>
                    <p>While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you. This data includes, but is not limited to:</p>
                    <ul>
                        <li>Email address</li>
                        <li>First name and last name</li>
                        <li>Phone number (optional)</li>
                        <li>Travel preferences and demographics</li>
                        <li>Payment information for premium features</li>
                    </ul>

                    <h3 class="mt-4">2.2. Usage and Planning Data</h3>
                    <p>This data is collected automatically and relates directly to your use of the platform:</p>
                    <ul>
                        <li>IP address, browser type, and operating system</li>
                        <li>Pages of our Service visited and time spent</li>
                        <li>Itinerary details (destinations, dates, points of interest)</li>
                        <li>Cost Calculator entries and budget parameters</li>
                        <li>Search queries and saved locations</li>
                    </ul>

                    <h2 class="section-title mt-5">3. Use of Data</h2>
                    <p>Smart Tourism Guide uses the collected data for the following purposes:</p>
                    <ul>
                        <li>To provide and maintain the Service</li>
                        <li>To notify you about changes to our Service</li>
                        <li>To allow you to participate in interactive features</li>
                        <li>To provide customer support</li>
                        <li>To monitor usage for platform improvement</li>
                        <li>To detect, prevent and address technical issues</li>
                        <li>To provide personalized travel suggestions</li>
                    </ul>

                    <h2 class="section-title mt-5">4. Data Retention</h2>
                    <p>We will retain your Personal Data only for as long as is necessary for the purposes set out in this Privacy Policy. We will retain and use your data to the extent necessary to comply with our legal obligations, resolve disputes, and enforce our legal agreements and policies.</p>

                    <h2 class="section-title mt-5">5. Data Transfer</h2>
                    <p>Your information, including Personal Data, may be transferred to computers located outside of your state, province, country or other governmental jurisdiction where the data protection laws may differ from those of your jurisdiction.</p>
                    <div class="alert alert-warning mt-3">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        By submitting your Personal Data, you agree to this transfer, storage, or processing. We will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy.
                    </div>

                    <h2 class="section-title mt-5">6. Data Security</h2>
                    <p>The security of your data is important to us, but remember that no method of transmission over the Internet or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>

                    <h2 class="section-title mt-5">7. Cookies and Tracking</h2>
                    <p>We use cookies and similar tracking technologies to track activity on our Service and hold certain information. Cookies are files with a small amount of data which may include an anonymous unique identifier.</p>
                    <p>You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.</p>

                    <h2 class="section-title mt-5">8. Your Data Protection Rights</h2>
                    <p>Depending on your location, you may have the following rights concerning your data:</p>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="d-flex mb-3">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; flex-shrink: 0;">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div>
                                    <h5 class="fw-semibold">Right to Access</h5>
                                    <p class="mb-0">Access the personal data we hold about you</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex mb-3">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; flex-shrink: 0;">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div>
                                    <h5 class="fw-semibold">Right to Rectification</h5>
                                    <p class="mb-0">Correct inaccurate or incomplete data</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex mb-3">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; flex-shrink: 0;">
                                    <i class="fas fa-trash"></i>
                                </div>
                                <div>
                                    <h5 class="fw-semibold">Right to Erasure</h5>
                                    <p class="mb-0">Request deletion of your personal data</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex mb-3">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; flex-shrink: 0;">
                                    <i class="fas fa-ban"></i>
                                </div>
                                <div>
                                    <h5 class="fw-semibold">Right to Object</h5>
                                    <p class="mb-0">Object to processing of your personal data</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="section-title mt-5">9. Third-Party Services</h2>
                    <p>We may employ third-party companies and individuals to facilitate our Service, provide the Service on our behalf, perform Service-related services, or assist us in analyzing how our Service is used.</p>
                    <p>These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>

                    <h2 class="section-title mt-5">10. Children's Privacy</h2>
                    <p>Our Service does not address anyone under the age of 13. We do not knowingly collect personally identifiable information from anyone under the age of 13. If you are a parent or guardian and you are aware that your child has provided us with Personal Data, please contact us.</p>

                    <h2 class="section-title mt-5">11. Changes to This Policy</h2>
                    <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Effective Date" at the top.</p>
                    <p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>

                    <h2 class="section-title mt-5">12. Contact Us</h2>
                    <p>If you have any questions about this Privacy Policy, please contact us:</p>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-envelope text-primary me-3 fs-5"></i>
                                <div>
                                    <h5 class="fw-semibold mb-1">Email</h5>
                                    <p class="mb-0">privacy@smarttourismguide.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-globe text-primary me-3 fs-5"></i>
                                <div>
                                    <h5 class="fw-semibold mb-1">Website</h5>
                                    <p class="mb-0"><a href="{{ route('contact') }}">Visit Contact Page</a></p>
                                </div>
                            </div>
                        </div>
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

        .section-title {
            color: #2a9d8f;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .privacy-content ul {
            list-style-type: none;
            padding-left: 0;
        }

        .privacy-content ul li {
            padding-left: 1.5rem;
            position: relative;
            margin-bottom: 0.5rem;
        }

        .privacy-content ul li:before {
            content: "•";
            color: #2a9d8f;
            font-weight: bold;
            position: absolute;
            left: 0.5rem;
        }

        .alert-warning {
            background-color: #fff3cd;
            border-color: #ffeaa7;
            color: #856404;
        }
    </style>
@endpush
