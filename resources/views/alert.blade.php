<style>
    .custom-alert {
        position: fixed;
        top: 100px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9999;

        display: flex;
        align-items: center;
        gap: 10px;

        padding: 12px 16px 12px 14px;
        min-width: 150px;
        max-width: 520px;

        color: #fff;
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .15);
        animation: slideDown .4s ease;
    }

    .custom-alert.success {
        background-color: #28a745;
    }

    .custom-alert.error {
        background-color: #dc3545;
    }

    .custom-alert .closebtn {
        margin-left: auto;
        background: transparent;
        border: 0;
        color: #fff;
        font-size: 20px;
        line-height: 1;
        cursor: pointer;
        padding: 0 4px;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translate(-50%, -10px);
        }

        to {
            opacity: 1;
            transform: translate(-50%, 0);
        }
    }
</style>

@if (session('success'))
    <div class="custom-alert success" role="alert">
        <span class="msg">{{ session('success') }} <i class="bi bi-check"></i></span>
    </div>
@endif

@if (session('error'))
    <div class="custom-alert error" role="alert">
        <span class="msg">{{ session('error') }} <i class="bi bi-exclamation-triangle"></i></span>
    </div>
@endif


<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Fungsi untuk menutup alert
        function closeAlert(alertElement) {
            alertElement.style.transition = 'opacity .3s';
            alertElement.style.opacity = '0';
            setTimeout(() => alertElement.remove(), 300);
        }

        // Tombol close
        document.querySelectorAll('.custom-alert .closebtn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const wrap = this.closest('.custom-alert');
                if (wrap) closeAlert(wrap);
            });
        });

        // Auto close setelah 3 detik
        document.querySelectorAll('.custom-alert').forEach(el => {
            setTimeout(() => {
                closeAlert(el);
            }, 3000);
        });
    });
</script>
