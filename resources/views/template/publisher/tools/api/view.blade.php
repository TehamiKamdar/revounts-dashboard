@extends("layouts.publisher.panel_app")

@pushonce('styles')

@endpushonce

@pushonce('scripts')
    <script>
        function clickToCopy() {
            const tokenInput = document.getElementById('api_token');
            tokenInput.select();
            tokenInput.setSelectionRange(0, 99999);
            document.execCommand('copy');

            showTokenMessage('Token copied to clipboard!', 'success');
        }

        function showTokenMessage(message, type) {
            const messageDiv = document.getElementById('tokenMessage');
            messageDiv.textContent = message;
            messageDiv.className = `token-message token-${type}`;
            messageDiv.style.display = 'block';

            setTimeout(() => {
                messageDiv.style.display = 'none';
            }, 3000);
        }

        // Initialize token visibility
        document.addEventListener('DOMContentLoaded', function() {
            const tokenInput = document.getElementById('api_token');
            if (tokenInput.value) {
                tokenInput.type = 'password';
            }
        });

        function toggleTokenVisibility() {
            const tokenInput = document.getElementById('api_token');
            const visibilityIcon = document.getElementById('visibilityIcon');

            if (tokenInput.type === 'password') {
                tokenInput.type = 'text';
                visibilityIcon.className = 'ri-eye-off-line';
            } else {
                tokenInput.type = 'password';
                visibilityIcon.className = 'ri-eye-line';
            }
        }
        function regenerateTokenRequest()
        {
            $.ajax({
                url: '{{ route("publisher.tools.api-info.regenerate-token") }}',
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    $("#api_token").val(response.token);
                },
                error: function (response) {
                    showErrors(response);
                }
            });
        }
    </script>
@endpushonce

@section("content")

    <div class="contents">
        <div class="container">
            <div class="api-token-glass-card card">
                <div class="card-body">
                    <div class="api-header">
                        <h3>API Token <small>This will be used for API documentation</small></h3>
                    </div>

                    <div class="row">
                        <div class="col-xxl-8 col-lg-10 col-md-12">
                            <div class="token-input-group">
                                <input type="password" class="token-input-glass form-control @error('api_token') border-danger @enderror"
                                       id="api_token" name="api_token"
                                       value="{{ auth()->user()->api_token }}"
                                       readonly>
                                <button type="button" class="token-visibility" onclick="toggleTokenVisibility()">
                                    <i class="ri-eye-line" id="visibilityIcon"></i>
                                </button>
                                <button type="button" class="token-copy-btn" onclick="clickToCopy()">
                                    <i class="ri-file-copy-line"></i> Copy
                                </button>
                            </div>

                            <div id="tokenMessage" class="token-message"></div>
                        </div>
                    </div>

                    <div class="token-actions">
                        <a href="javascript:void(0)" onclick="clickToCopy()" class="btn-token btn-copy">
                            <i class="ri-file-copy-line"></i> Copy Token
                        </a>
                        <a href="javascript:void(0)" onclick="regenerateTokenRequest()" class="btn-token btn-regenerate">
                            <i class="ri-refresh-line"></i> Regenerate Token
                        </a>
                        <a href="{{ env('DOC_APP_URL') . '/api/documentation' }}" class="btn-token btn-docs" target="_blank">
                            <i class="ri-book-open-line"></i> View Documentation
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
