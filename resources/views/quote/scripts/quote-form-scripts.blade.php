<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                // Remove selection from all cards
                optionCards.forEach(c => {
                    c.classList.remove('border-blue-500', 'bg-blue-50');
                    c.classList.add('border-gray-200');
                });

                // Add selection to clicked card
                this.classList.remove('border-gray-200');
                this.classList.add('border-blue-500', 'bg-blue-50');

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
            // Validation for step 1
            if (step === 2 && !selectedGonderiType) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Uyarı',
                    text: 'Lütfen bir gönderi türü seçin!'
                });
                return;
            }

            // Validation for step 2 before going to step 3
            if (step === 3 && !validateStep2()) {
                return;
            }

            if (step === 2) {
                document.getElementById('selected-type-display').textContent = selectedGonderiType;
                showRelevantForm();
            }

            if (step === 3) {
                updateSummary();
            }

            // Hide all steps
            document.querySelectorAll('.step-content').forEach(content => {
                content.classList.add('hidden');
            });

            // Show current step
            document.getElementById(`step-${step}-content`).classList.remove('hidden');

            // Update progress bar
            document.getElementById('progress-bar').style.width = `${(step / 3) * 100}%`;
            currentStep = step;
            console.log('Step changed to:', currentStep);
        }

        // Step 2 validation function
        function validateStep2() {
            let isValid = true;
            let requiredFields = [];

            // Determine required fields based on selected type
            switch (selectedGonderiType) {
                case 'Kargo ve Paket Taşımacılığı':
                    requiredFields = ['kargo-from', 'kargo-to', 'kargo-weight'];
                    break;
                case 'Komple Tır':
                    requiredFields = [];
                    break;
                case 'Ticari Eşya Taşımacılığı':
                    requiredFields = ['ticari-from', 'ticari-to', 'ticari-total-weight'];
                    break;
                case 'Yeni Mobilya Taşımacılığı':
                    requiredFields = ['mobilya-from', 'mobilya-to', 'mobilya-weight'];
                    break;
                case 'Uluslararası Evden Eve Taşımacılık':
                    requiredFields = ['evden-from', 'evden-to', 'evden-volume'];
                    break;
                case 'Araç ve Motosiklet Taşımacılığı':
                    requiredFields = ['arac-from', 'arac-to', 'arac-brand', 'arac-model'];
                    break;
                case 'Konteyner Taşımacılığı':
                    requiredFields = ['konteyner-destination-country', 'konteyner-origin-port', 'konteyner-destination-port'];
                    break;
            }

            // Check required fields
            for (const fieldId of requiredFields) {
                const field = document.getElementById(fieldId);
                if (!field || !field.value.trim()) {
                    isValid = false;
                    const fieldLabel = field ? (field.previousElementSibling ? field.previousElementSibling.innerText : fieldId) : fieldId;

                    Swal.fire({
                        icon: 'error',
                        title: 'Eksik Bilgi',
                        text: `Lütfen "${fieldLabel}" alanını doldurun.`
                    });
                    break;
                }
            }

            return isValid;
        }

        // Show relevant form based on selected type
        function showRelevantForm() {
            document.querySelectorAll('.form-section').forEach(form => {
                form.classList.add('hidden');
            });

            switch (selectedGonderiType) {
                case 'Kargo ve Paket Taşımacılığı':
                    document.getElementById('kargo-form').classList.remove('hidden');
                    break;
                case 'Komple Tır':
                    document.getElementById('tir-form').classList.remove('hidden');
                    break;
                case 'Ticari Eşya Taşımacılığı':
                    document.getElementById('ticari-form').classList.remove('hidden');
                    break;
                case 'Yeni Mobilya Taşımacılığı':
                    document.getElementById('mobilya-form').classList.remove('hidden');
                    break;
                case 'Uluslararası Evden Eve Taşımacılık':
                    document.getElementById('evden-eve-form').classList.remove('hidden');
                    break;
                case 'Araç ve Motosiklet Taşımacılığı':
                    document.getElementById('arac-form').classList.remove('hidden');
                    break;
                case 'Konteyner Taşımacılığı':
                    document.getElementById('konteyner-form').classList.remove('hidden');
                    break;
            }
        }

        // Update summary
        function updateSummary() {
            document.getElementById('summary-gonderi-text').textContent = selectedGonderiType;
            let summaryHTML = '<div class="space-y-3"><h4 class="font-semibold text-gray-800 mb-2">Detaylar:</h4>';

            switch (selectedGonderiType) {
                case 'Kargo ve Paket Taşımacılığı':
                    summaryHTML += `
                        <div class="text-sm text-gray-600 space-y-1">
                            <p><span class="font-medium">Gönderici:</span> ${document.getElementById('kargo-sender-name')?.value || 'Belirtilmedi'}</p>
                            <p><span class="font-medium">Alıcı:</span> ${document.getElementById('kargo-receiver-name')?.value || 'Belirtilmedi'}</p>
                            <p><span class="font-medium">Güzergah:</span> ${document.getElementById('kargo-from')?.value || '?'} → ${document.getElementById('kargo-to')?.value || '?'}</p>
                            <p><span class="font-medium">Ağırlık:</span> ${document.getElementById('kargo-weight')?.value || '0'} kg</p>
                            <p><span class="font-medium">Boyutlar:</span> ${document.getElementById('kargo-width')?.value || '0'}x${document.getElementById('kargo-length')?.value || '0'}x${document.getElementById('kargo-height')?.value || '0'} cm</p>
                            <p><span class="font-medium">İçerik:</span> ${document.getElementById('kargo-content')?.value || 'Belirtilmedi'}</p>
                            <p><span class="font-medium">Sigorta:</span> ${document.getElementById('kargo-insurance')?.value || 'Belirtilmedi'}</p>
                        </div>`;
                    break;

                case 'Ticari Eşya Taşımacılığı':
                    summaryHTML += `
                        <div class="text-sm text-gray-600 space-y-1">
                            <p><span class="font-medium">Gönderici Firma:</span> ${document.getElementById('ticari-sender-company')?.value || 'Belirtilmedi'}</p>
                            <p><span class="font-medium">Alıcı Firma:</span> ${document.getElementById('ticari-receiver-company')?.value || 'Belirtilmedi'}</p>
                            <p><span class="font-medium">Güzergah:</span> ${document.getElementById('ticari-from')?.value || '?'} → ${document.getElementById('ticari-to')?.value || '?'}</p>
                            <p><span class="font-medium">Eşya Türü:</span> ${document.getElementById('ticari-goods-type')?.value || 'Belirtilmedi'}</p>
                            <p><span class="font-medium">Toplam Ağırlık:</span> ${document.getElementById('ticari-total-weight')?.value || '0'} kg</p>
                            <p><span class="font-medium">Palet Sayısı:</span> ${document.getElementById('ticari-pallets')?.value || '0'}</p>
                            <p><span class="font-medium">Nakliye Türü:</span> ${document.getElementById('ticari-transport-type')?.value || 'Belirtilmedi'}</p>
                        </div>`;
                    break;

                default:
                    summaryHTML += `<p class="text-sm text-gray-600">Seçilen hizmet için detaylar hazırlanıyor...</p>`;
            }

            summaryHTML += '</div>';
            document.getElementById('summary-details').innerHTML = summaryHTML;
        }

        // Submit form function
        function submitForm() {
            const submitButton = document.getElementById('submit-form');

            // Disable button and show loading state
            submitButton.disabled = true;
            submitButton.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Gönderiliyor...
            `;

            // Prepare form data
            const postData = {
                offer_type: selectedGonderiType,
                details: {}
            };

            // Collect data from active form
            const activeForm = document.querySelector('.form-section:not(.hidden)');
            if (activeForm) {
                const formInputs = activeForm.querySelectorAll('input, select, textarea');
                formInputs.forEach(input => {
                    let label = input.previousElementSibling ? input.previousElementSibling.innerText : input.id;
                    postData.details[label] = input.value;
                });
            }

            // Simulate API call (replace with your actual endpoint)
            setTimeout(() => {
                Swal.fire({
                    title: 'Harika!',
                    text: 'Teklif talebiniz başarıyla gönderildi! En kısa sürede size dönüş yapılacaktır.',
                    icon: 'success',
                    confirmButtonText: 'Tamam'
                }).then((result) => {
                    if (result.isConfirmed) {
                        resetForm();
                    }
                });

                // Re-enable button
                submitButton.disabled = false;
                submitButton.innerHTML = 'Teklif Al';
            }, 2000);

            /* 
            // Uncomment and modify this for actual API call
            fetch("/quote-request", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(postData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'Harika!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'Tamam'
                    }).then(() => {
                        resetForm();
                    });
                } else {
                    const errorMessages = data.errors ? Object.values(data.errors).join('\n') : data.message;
                    Swal.fire({
                        title: 'Hata!',
                        text: errorMessages || 'Bir sorun oluştu. Lütfen bilgilerinizi kontrol edin.',
                        icon: 'error',
                        confirmButtonText: 'Tekrar Dene'
                    });
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
                Swal.fire({
                    title: 'Ağ Hatası!',
                    text: 'Sunucuya bağlanırken bir sorun oluştu.',
                    icon: 'error',
                    confirmButtonText: 'Tamam'
                });
            })
            .finally(() => {
                submitButton.disabled = false;
                submitButton.innerHTML = 'Teklif Al';
            });
            */
        }

        // Reset form function
        function resetForm() {
            document.getElementById('quote-form').reset();
            selectedGonderiType = '';

            // Reset card selections
            optionCards.forEach(card => {
                card.classList.remove('border-blue-500', 'bg-blue-50');
                card.classList.add('border-gray-200');
            });

            // Hide all form sections
            document.querySelectorAll('.form-section').forEach(section => {
                section.classList.add('hidden');
            });

            goToStep(1);
        }

        // Form field listeners for real-time summary updates
        function attachFormListeners() {
            const allFields = document.querySelectorAll('#step-2-content input, #step-2-content select, #step-2-content textarea');
            allFields.forEach(element => {
                if (element) {
                    element.addEventListener('input', updateSummary);
                    element.addEventListener('change', updateSummary);
                }
            });
        }

        // Initialize form listeners
        attachFormListeners();
    });
</script>