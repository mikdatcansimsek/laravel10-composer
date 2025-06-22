<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ürün Oluştur</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
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
            accent-color: #667eea;
        }

        .checkbox-label {
            margin: 0;
            color: #555;
            font-size: 16px;
            cursor: pointer;
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
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
    </style>
</head>
<body>
<div class="container">
    <h1>🛍️ Ürün Ekle</h1>

    <form action="/urunler/ekle" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">
                <span class="form-icon">📦</span>
                Ürün Adı
            </label>
            <input type="text" id="name" name="name" placeholder="Ürün adını girin..." required>
        </div>

        <div class="form-group">
            <label for="description">
                <span class="form-icon">📝</span>
                Açıklama
            </label>
            <textarea id="description" name="description" placeholder="Ürün açıklamasını yazın..." required></textarea>
        </div>

        <div class="form-group">
            <label for="price">
                <span class="form-icon">💰</span>
                Fiyat (₺)
            </label>
            <input type="number" id="price" name="price" placeholder="0.00" step="0.01" min="0" required>
        </div>

        <div class="form-group">
            <label for="qty">
                Stok Adet
            </label>
            <input type="number" id="qty" name="qty"  required>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="is_published" name="is_published" value="1">
            <label for="is_published" class="checkbox-label">
                <span class="form-icon">🚀</span>
                Hemen Yayınla
            </label>
        </div>

        <button type="submit" class="btn">
            ✨ Ürün Ekle
        </button>
    </form>
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

        // Price input formatting
        const priceInput = document.getElementById('price');
        priceInput.addEventListener('input', function() {
            if (this.value < 0) {
                this.value = 0;
            }
        });

        // Form submission
        form.addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const description = document.getElementById('description').value.trim();
            const price = document.getElementById('price').value;

            if (!name || !description || !price) {
                e.preventDefault();
                alert('Lütfen tüm alanları doldurun!');
                return;
            }

            if (parseFloat(price) <= 0) {
                e.preventDefault();
                alert('Lütfen geçerli bir fiyat girin!');
                return;
            }

            // Success animation
            const button = form.querySelector('.btn');
            button.innerHTML = '⏳ Ekleniyor...';
            button.disabled = true;
        });
    });
</script>
</body>
</html>
