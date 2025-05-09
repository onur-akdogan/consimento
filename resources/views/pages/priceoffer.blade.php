@extends('layouts.app')

@section('title', 'Fiyat Teklifi Al')
 

 
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-sm-center flex-sm-row flex-column mb-4">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Fiyat Teklifi Al</h4>
                </div>
            </div>
            
            <form id="quote-form">
                <!-- Progress Bar -->
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 33.33%" id="progress-bar"></div>
                </div>

                <!-- Step 1: Gönderi Türü -->
                <div class="step-content" id="step-1-content">
                    <h5 class="text-center step-header">Gönderi Türü Seçin</h5>
                    <div class="row g-3 justify-content-center">
                        <!-- Option Cards -->
                        <div class="col-6 col-md-4 mb-3">
                            <div class="card text-center p-3 h-100 option-card" data-type="Kargo ve Paket Taşımacılığı">
                                <div class="icon-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-box">
                                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                    </svg>
                                </div>
                                <div class="fw-semibold">Kargo ve Paket Taşımacılığı</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <div class="card text-center p-3 h-100 option-card" data-type="Ticari Eşya Taşımacılığı">
                                <div class="icon-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-truck">
                                        <rect x="1" y="3" width="15" height="13"></rect>
                                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                        <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                        <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                    </svg>
                                </div>
                                <div class="fw-semibold">Ticari Eşya Taşımacılığı</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <div class="card text-center p-3 h-100 option-card" data-type="Yeni Mobilya Taşımacılığı">
                                <div class="icon-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-home">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                </div>
                                <div class="fw-semibold">Yeni Mobilya Taşımacılığı</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <div class="card text-center p-3 h-100 option-card" data-type="Uluslararası Evden Eve Taşımacılık">
                                <div class="icon-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-file-text">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                </div>
                                <div class="fw-semibold">Uluslararası Evden Eve Taşımacılık</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <div class="card text-center p-3 h-100 option-card" data-type="Araç ve Motosiklet Taşımacılığı">
                                <div class="icon-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-truck">
                                        <rect x="1" y="3" width="15" height="13"></rect>
                                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                        <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                        <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                    </svg>
                                </div>
                                <div class="fw-semibold">Araç ve Motosiklet Taşımacılığı</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <div class="card text-center p-3 h-100 option-card" data-type="Konteyner Taşımacılığı">
                                <div class="icon-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                                        stroke-linejoin="round" class="feather feather-package">
                                        <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                    </svg>
                                </div>
                                <div class="fw-semibold">Konteyner Taşımacılığı</div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-primary" id="step1-next">Devam Et</button>
                    </div>
                </div>

                <!-- Step 2: Gönderi Bilgileri -->
                <div class="step-content d-none" id="step-2-content">
                    <h5 class="text-center step-header">Gönderi Bilgileri</h5>

                    <div class="alert alert-info mb-4">
                        <strong>Seçilen Gönderi Türü:</strong> <span id="selected-type-display"></span>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Ağırlık (kg)</label>
                            <input type="number" class="form-control" id="weight-input" placeholder="Örneğin 50">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ülke</label>
                            <select class="form-select" id="country-input">
                                <option value="">Seçiniz</option>
@foreach ($ulkes as $ulke)
<option value={{$ulke->ad}}>{{$ulke->ad}}</option>

@endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-secondary me-2" id="step2-prev">Geri</button>
                        <button type="button" class="btn btn-primary" id="step2-next">Devam Et</button>
                    </div>
                </div>

                <!-- Step 3: Teklif Özeti -->
                <div class="step-content d-none" id="step-3-content">
                    <h5 class="text-center step-header">Teklif Özeti</h5>
                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Gönderi Türü:</strong>
                                    <span id="summary-gonderi-text"></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Ağırlık:</strong>
                                    <span id="summary-weight-text"></span> kg
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Ülke:</strong>
                                    <span id="summary-country-text"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary me-2" id="step3-prev">Geri</button>
                        <button type="button" class="btn btn-success" id="submit-form">Teklif Al</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .option-card {
        cursor: pointer;
        transition: transform 0.3s, box-shadow 0.3s;
        position: relative;
        overflow: hidden;
    }

    .option-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
    }

    .option-card.selected {
        border: 3px solid #0d6efd;
        background-color: rgba(13, 110, 253, 0.1);
        box-shadow: 0 0 15px rgba(13, 110, 253, 0.4);
    }

    .option-card.selected::before {
        content: "✓";
        position: absolute;
        top: -5px;
        right: 10px;
        background-color: #0d6efd;
        color: white;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }

    .option-card.selected .icon-container {
        color: #0d6efd;
    }

    .option-card.selected .fw-semibold {
        color: #0d6efd;
        font-weight: bold !important;
    }

    .icon-container {
        margin-bottom: 0.5rem;
    }

    .icon-container svg {
        width: 40px;
        height: 40px;
    }

    .progress {
        height: 8px;
    }

    .step-content {
        transition: opacity 0.3s ease;
    }

    .step-header {
        margin-bottom: 1.5rem;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Form variables
        let selectedGonderiType = '';
        let currentStep = 1;
        
        // Select all option cards
        const optionCards = document.querySelectorAll('.option-card');
        
        // Add click event listener to all option cards
        optionCards.forEach(card => {
            card.addEventListener('click', function() {
                // Remove selected class from all cards
                optionCards.forEach(c => c.classList.remove('selected'));
                
                // Add selected class to clicked card
                this.classList.add('selected');
                
                // Save selected type
                selectedGonderiType = this.getAttribute('data-type');
                console.log('Selected type:', selectedGonderiType);
            });
        });
        
        // Navigation buttons
        document.getElementById('step1-next').addEventListener('click', () => goToStep(2));
        document.getElementById('step2-prev').addEventListener('click', () => goToStep(1));
        document.getElementById('step2-next').addEventListener('click', () => goToStep(3));
        document.getElementById('step3-prev').addEventListener('click', () => goToStep(2));
        document.getElementById('submit-form').addEventListener('click', submitForm);
        
        // Step navigation function
        function goToStep(step) {
            // Validation
            if (step === 2 && !selectedGonderiType) {
                 Swal.fire("Lütfen bir gönderi türü seçin!");

                return;
            }
            
            if (step === 2) {
                document.getElementById('selected-type-display').textContent = selectedGonderiType;
            }
            
            if (step === 3) {
                const weight = document.getElementById('weight-input').value;
                const country = document.getElementById('country-input').value;
                
                if (!weight) {
                  Swal.fire("Lütfen ağırlık bilgisini girin!");

                    return;
                }
                
                if (!country) {
                   Swal.fire("Lütfen ülke seçin!");

                    return;
                }
                
                // Update summary
                document.getElementById('summary-gonderi-text').textContent = selectedGonderiType;
                document.getElementById('summary-weight-text').textContent = weight;
                document.getElementById('summary-country-text').textContent = country;
            }
            
            // Hide all step contents
            document.querySelectorAll('.step-content').forEach(content => {
                content.classList.add('d-none');
            });
            
            // Show requested step content
            document.getElementById(`step-${step}-content`).classList.remove('d-none');
            
            // Update progress bar
            document.getElementById('progress-bar').style.width = `${(step / 3) * 100}%`;
            
            // Update current step
            currentStep = step;
            console.log('Step changed to:', currentStep);
        }
        
        // Form submission function
        function submitForm() {
            // Collect form data
            const formData = {
                gonderiTuru: selectedGonderiType,
                agirlik: document.getElementById('weight-input').value,
                ulke: document.getElementById('country-input').value
            };
            
            console.log('Form data:', formData);
            
            // Show success message
             Swal.fire({
  title: "Teklifiniz alındı. En kısa sürede sizinle iletişime geçeceğiz",
  icon: "success",
  draggable: true
});

            
            // Here you would add AJAX code to submit to server
            // Example with fetch:
            /*
            fetch('/api/quote', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
            */
        }
    });
</script>
@endsection