<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ürün Düzenle</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 600;
        }

        .product-info {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            border-left: 4px solid #f5576c;
        }

        .product-info p {
            color: #666;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .product-info strong {
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
            font-size: 14px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            outline: none;
            border-color: #f5576c;
            box-shadow: 0 0 0 3px rgba(245, 87, 108, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            accent-color: #f5576c;
        }

        .checkbox-label {
            margin: 0;
            color: #555;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            min-width: 120px;
        }

        .btn-update {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }

        .btn-update:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(245, 87, 108, 0.3);
        }

        .btn-cancel {
            background: #6c757d;
            color: white;
        }

        .btn-cancel:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(108, 117, 125, 0.3);
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(220, 53, 69, 0.3);
        }

        .btn:active {
            transform: translateY(0);
        }

        .form-icon {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 8px;
            vertical-align: middle;
        }

        @media (max-width: 600px) {
            .container {
                padding: 30px 20px;
                margin: 10px;
            }

            h1 {
                font-size: 24px;
            }

            .btn-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }

        /* Placeholder styling */
        ::placeholder {
            color: #999;
            opacity: 1;
        }

        /* Custom scrollbar for textarea */
        textarea::-webkit-scrollbar {
            width: 6px;
        }

        textarea::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        textarea::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        textarea::-webkit-scrollbar-thumb:hover {
            background: #a1a1a1;
        }

        .last-updated {
            font-size: 12px;
            color: #888;
            text-align: center;
            margin-top: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>✏️ Ürün Düzenle</h1>
    <form action="/urunler/duzenle/{{$product->id}}" method="POST">

        @csrf
        <div class="form-group">
            <label for="name">
                <span class="form-icon">📦</span>
                Ürün Adı
            </label>
            <input type="text" id="name" name="name" value={{$product->name}} required>
        </div>

        <div class="form-group">
            <label for="description">
                <span class="form-icon">📝</span>
                Açıklama
            </label>
            <textarea id="description" name="description" required>{{$product->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="price">
                <span class="form-icon">💰</span>
                Fiyat (₺)
            </label>
            <input type="number" id="price" name="price" value={{$product->price}} step="0.01" min="0" required>
        </div>

        <div class="form-group">
            <label for="qty">
                <span class="form-icon">📦</span>
                Stok Adet
            </label>
            <input type="number" id="qty" name="qty" value="{{$product->qty}}" min="0" required>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="is_published" name="is_published" value="1" {{ $product->ispublished ? 'checked' : '' }}>
            <label for="is_published" class="checkbox-label">
                <span class="form-icon">🚀</span>
                Yayınlanmış
            </label>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-update">
                💾 Güncelle
            </button>

            <button type="button" class="btn btn-cancel" onclick="window.location.href='#'">
                ❌ İptal
            </button>

            <button type="button" class="btn btn-delete" onclick="confirmDelete()">
                🗑️ Sil
            </button>
        </div>
    </form>

    <div class="last-updated">
        Son güncelleme: 22 Haziran 2025, 14:30
    </div>
</div>

<script>
    // Form validation and enhancements
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const inputs = form.querySelectorAll('input, textarea');

        // Add focus/blur effects
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Price and qty input formatting
        const priceInput = document.getElementById('price');
        const qtyInput = document.getElementById('qty');

        priceInput.addEventListener('input', function() {
            if (this.value < 0) {
                this.value = 0;
            }
        });

        qtyInput.addEventListener('input', function() {
            if (this.value < 0) {
                this.value = 0;
            }
        });

        // Form submission
        form.addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const description = document.getElementById('description').value.trim();
            const price = document.getElementById('price').value;
            const qty = document.getElementById('qty').value;

            if (!name || !description || !price || !qty) {
                e.preventDefault();
                alert('Lütfen tüm alanları doldurun!');
                return;
            }

            if (parseFloat(price) <= 0) {
                e.preventDefault();
                alert('Lütfen geçerli bir fiyat girin!');
                return;
            }

            if (parseInt(qty) < 0) {
                e.preventDefault();
                alert('Stok adedi negatif olamaz!');
                return;
            }

            // Success animation
            const button = form.querySelector('.btn-update');
            button.innerHTML = '⏳ Güncelleniyor...';
            button.disabled = true;
        });

        // Track changes
        let originalValues = {};
        inputs.forEach(input => {
            originalValues[input.name] = input.value;
        });

        // Check for changes
        function checkForChanges() {
            let hasChanges = false;
            inputs.forEach(input => {
                if (input.type === 'checkbox') {
                    if (input.checked !== (originalValues[input.name] === 'on')) {
                        hasChanges = true;
                    }
                } else {
                    if (input.value !== originalValues[input.name]) {
                        hasChanges = true;
                    }
                }
            });

            const updateBtn = document.querySelector('.btn-update');
            if (hasChanges) {
                updateBtn.style.background = 'linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%)';
                updateBtn.innerHTML = '💾 Değişiklikleri Kaydet';
            } else {
                updateBtn.style.background = 'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)';
                updateBtn.innerHTML = '💾 Güncelle';
            }
        }

        inputs.forEach(input => {
            input.addEventListener('input', checkForChanges);
            input.addEventListener('change', checkForChanges);
        });
    });

    // Delete confirmation
    function confirmDelete() {
        const productName = document.getElementById('name').value;
        if (confirm(`"${productName}" ürününü silmek istediğinizden emin misiniz?\n\nBu işlem geri alınamaz!`)) {
            // Create delete form
            const deleteForm = document.createElement('form');
            deleteForm.method = 'POST';
            deleteForm.action = '#'; // Laravel delete route buraya gelecek

            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';

            const tokenInput = document.createElement('input');
            tokenInput.type = 'hidden';
            tokenInput.name = '_token';
            tokenInput.value = 'csrf-token-here'; // Laravel CSRF token

            deleteForm.appendChild(methodInput);
            deleteForm.appendChild(tokenInput);
            document.body.appendChild(deleteForm);

            deleteForm.submit();
        }
    }

    // Warn user about unsaved changes
    window.addEventListener('beforeunload', function(e) {
        const inputs = document.querySelectorAll('input, textarea');
        let hasChanges = false;

        inputs.forEach(input => {
            if (input.dataset.original !== input.value) {
                hasChanges = true;
            }
        });

        if (hasChanges) {
            e.preventDefault();
            e.returnValue = '';
        }
    });
</script>
</body>
</html>
