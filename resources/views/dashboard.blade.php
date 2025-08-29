<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate Internship Certificate') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('status'))
                        <div class="mb-4 text-green-600">{{ session('status') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="mb-4 text-red-600">{{ session('error') }}</div>
                    @endif
                    <form action="{{ route('certificate.generate') }}" method="POST" id="certificate-form" onsubmit="updateFormAction()">
                        @csrf
                        <div class="mb-4">
                            <label for="template_id" class="block text-sm font-medium text-gray-700">Certificate Type</label>
                            <select name="template_id" id="template_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required aria-label="Select certificate type">
                                <option value="" disabled selected>Select a certificate type</option>
                                @foreach (\App\Models\CertificateTemplate::all() as $template)
                                    <option value="{{ $template->id }}">{{ $template->name }}</option>
                                @endforeach
                            </select>
                            @error('template_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4" id="single-user-selection">
                            <label for="user_id" class="block text-sm font-medium text-gray-700">Intern</label>
                            <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" aria-label="Select intern">
                                <option value="" disabled selected>Select an intern</option>
                                @foreach (\App\Models\User::all() as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 hidden" id="multiple-user-selection">
                            <label for="user_ids" class="block text-sm font-medium text-gray-700">Interns (Select Multiple)</label>
                            <select name="user_ids[]" id="user_ids" multiple class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" aria-label="Select multiple interns">
                                @foreach (\App\Models\User::all() as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_ids')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="internship_position" class="block text-sm font-medium text-gray-700">Internship Position</label>
                            <input type="text" name="internship_position" id="internship_position" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required aria-label="Internship position">
                            @error('internship_position')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="internship_start_date" class="block text-sm font-medium text-gray-700">Internship Start Date</label>
                            <input type="date" name="internship_start_date" id="internship_start_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required aria-label="Internship start date">
                            @error('internship_start_date')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="internship_end_date" class="block text-sm font-medium text-gray-700">Internship End Date</label>
                            <input type="date" name="internship_end_date" id="internship_end_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required aria-label="Internship end date">
                            @error('internship_end_date')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="issuer_first_name" class="block text-sm font-medium text-gray-700">Issuer First Name</label>
                            <input type="text" name="issuer_first_name" id="issuer_first_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required aria-label="Issuer first name">
                            @error('issuer_first_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="issuer_last_name" class="block text-sm font-medium text-gray-700">Issuer Last Name</label>
                            <input type="text" name="issuer_last_name" id="issuer_last_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required aria-label="Issuer last name">
                            @error('issuer_last_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="issuer_position" class="block text-sm font-medium text-gray-700">Issuer Position/Title</label>
                            <input type="text" name="issuer_position" id="issuer_position" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required aria-label="Issuer position or title">
                            @error('issuer_position')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                            <input type="text" name="company_name" id="company_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required aria-label="Company name">
                            @error('company_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="signature" class="block text-sm font-medium text-gray-700">Signature (Draw or Upload)</label>
                            <canvas id="signature-pad" class="border border-gray-300 rounded-md" width="310" height="114" aria-label="Draw your signature"></canvas>
                            <div class="mt-2">
                                <input type="file" id="signature-upload" accept="image/png,image/jpeg" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" aria-label="Upload signature image">
                                <button type="button" id="clear-signature" class="mt-2 px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Clear Signature</button>
                                <img id="signature-preview" class="hidden mt-2" style="width:150px;height:60px;" alt="Signature Preview">
                            </div>
                            <input type="hidden" name="signature" id="signature-input">
                            @error('signature')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="date_signed" class="block text-sm font-medium text-gray-700">Date Signed</label>
                            <input type="date" name="date_signed" id="date_signed" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required aria-label="Date signed">
                            @error('date_signed')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" id="submit-button" class="px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700 disabled:bg-blue-400" disabled>Generate Certificate(s)</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.2.0/dist/signature_pad.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const canvas = document.getElementById('signature-pad');
            const signaturePad = new SignaturePad(canvas, {
                penColor: 'black',
                minWidth: 1,
                maxWidth: 3
            });
            const signatureInput = document.getElementById('signature-input');
            const signaturePreview = document.getElementById('signature-preview');
            const clearButton = document.getElementById('clear-signature');
            const signatureUpload = document.getElementById('signature-upload');
            const submitButton = document.getElementById('submit-button');
            const generationType = document.getElementById('generation_type');
            const singleUserSelection = document.getElementById('single-user-selection');
            const multipleUserSelection = document.getElementById('multiple-user-selection');
            const userIdSelect = document.getElementById('user_id');
            const userIdsSelect = document.getElementById('user_ids');

            // Function to update signature input and preview
            function updateSignature(dataUrl) {
                signatureInput.value = dataUrl;
                signaturePreview.src = dataUrl;
                signaturePreview.classList.remove('hidden');
                submitButton.disabled = !dataUrl;
                console.log('Signature updated:', dataUrl.substring(0, 50) + '...');
            }

            // Handle canvas signature
            signaturePad.addEventListener('endStroke', () => {
                const dataUrl = signaturePad.toDataURL('image/png');
                updateSignature(dataUrl);
            });

            // Handle image upload
            signatureUpload.addEventListener('change', (event) => {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = new Image();
                        img.onload = function () {
                            // Clear canvas and draw uploaded image
                            const ctx = canvas.getContext('2d');
                            ctx.clearRect(0, 0, canvas.width, canvas.height);
                            ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                            const dataUrl = canvas.toDataURL('image/png');
                            updateSignature(dataUrl);
                            signaturePad.clear(); // Clear signature pad strokes
                        };
                        img.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Clear signature
            clearButton.addEventListener('click', () => {
                signaturePad.clear();
                signatureUpload.value = '';
                signatureInput.value = '';
                signaturePreview.src = '';
                signaturePreview.classList.add('hidden');
                submitButton.disabled = true;
                console.log('Signature cleared');
            });

            // Toggle user selection
            window.toggleUserSelection = function () {
                if (generationType.value === 'single') {
                    singleUserSelection.classList.remove('hidden');
                    multipleUserSelection.classList.add('hidden');
                    userIdSelect.required = true;
                    userIdsSelect.required = false;
                } else {
                    singleUserSelection.classList.add('hidden');
                    multipleUserSelection.classList.remove('hidden');
                    userIdSelect.required = false;
                    userIdsSelect.required = true;
                }
            };

            // Update form action
            window.updateFormAction = function () {
                const form = document.getElementById('certificate-form');
                form.action = "{{ route('certificate.generate') }}";
            };

            // Date validation
            const startDateInput = document.getElementById('internship_start_date');
            const endDateInput = document.getElementById('internship_end_date');
            endDateInput.addEventListener('change', function () {
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);
                if (startDate && endDate && endDate < startDate) {
                    endDateInput.setCustomValidity('End date must be after or equal to start date.');
                } else {
                    endDateInput.setCustomValidity('');
                }
            });

            // Form submission validation
            document.getElementById('certificate-form').addEventListener('submit', function (event) {
                if (!signatureInput.value) {
                    event.preventDefault();
                    alert('Please provide a signature by drawing or uploading an image.');
                    console.log('Form submission blocked: No signature');
                }
                if (generationType.value === 'single' && !userIdSelect.value) {
                    event.preventDefault();
                    alert('Please select an intern.');
                    console.log('Form submission blocked: No single user selected');
                }
                if (generationType.value === 'multiple' && !userIdsSelect.selectedOptions.length) {
                    event.preventDefault();
                    alert('Please select at least one intern.');
                    console.log('Form submission blocked: No multiple users selected');
                }
                console.log('Form submitted with signature:', signatureInput.value.substring(0, 50) + '...');
            });
        });
    </script>
</x-app-layout>