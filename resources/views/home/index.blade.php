<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>منتجاتنا</title>
    <style>
        * {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f7f7f7;
            margin-top: 80px; /* إضافة مسافة للـ navbar الثابت */
        }

        /* ناف بار ثابت */
        nav {
            background-color: #34495E;  /* اللون الأساسي للناف بار */
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            padding: 14px 30px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  /* تأثير الظل */
            color: white;
        }

        /* روابط الناف بار */
        nav a {
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 16px;
            text-align: center;
            font-family: 'Segoe UI', sans-serif;
        }

        nav a:hover {
            background-color: #16A085;  /* لون جذاب عند التحويم */
            color: white;
            border-radius: 5px;
        }

        /* قائمة التصنيفات */
        nav .dropdown {
            position: relative;
        }

        nav .dropdown .dropbtn {
            background-color: #34495E;
            color: white;
            padding: 14px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-family: 'Segoe UI', sans-serif;
        }

        nav .dropdown:hover .dropbtn {
            background-color: #16A085;
            color: white;
        }

        nav .dropdown-content {
            display: none;
            position: absolute;
            background-color: #34495E;
            min-width: 160px;
            z-index: 1000;
            border-radius: 5px;
            padding: 10px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            top: 100%;
            left: 0;
        }

        nav .dropdown:hover .dropdown-content {
            display: grid;
            z-index: 1000;
        }

        nav .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 14px;
            font-family: 'Segoe UI', sans-serif;
        }

        nav .dropdown-content a:hover {
            background-color: #16A085;
            color: white;
        }

        /* Header Section */
        header {
            background-color: #1ABC9C;  /* لون جذاب لعنوان الموقع */
            padding: 3rem 0;
            text-align: center;
            color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        h1 {
            font-size: 3rem;
            line-height: 1.2;
        }

        /* إضافة لوجو المتجر */
        .logo img {
            width: 50px;
            height: auto;
            transition: box-shadow 0.3s ease;
        }

        /* عند التمرير فوق الشعار */
        .logo img:hover {
            box-shadow: 0 0 15px 5px rgba(255, 255, 255, 0.8);  /* إضاءة بيضاء حول الشعار */
        }

        main {
            padding: 2rem;
        }

        /* تصميم المنتجات */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .product-card {
            background-color: white;
            border-radius: 12px;
            padding: 1rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.2s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card img:hover {
            transform: scale(1.05);
        }

        h2 {
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 10px;
        }

        p {
            font-size: 1rem;
            color: #555;
            margin: 10px 0;
        }

        button {
            margin-top: 10px;
            padding: 0.5rem 1rem;
            background-color: #16A085;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s ease;
        }

        button:hover {
            background-color: #1ABC9C;
            transform: scale(1.05);
        }

        /* تصميم الزر "عرض المزيد" */
        .load-more-btn {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #16A085;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .load-more-btn:hover {
            background-color: #1ABC9C;
        }
    </style>
</head>
<body>
    <nav>
        <!-- لوجو المتجر -->
        <div class="logo">
            <img src="{{ asset('storage/images/logo1.png') }}" alt="Logo"> <!-- تأكد من إضافة شعار المتجر هنا -->
        </div>
        <a href="#">عالم التسوق</a>
        <a href="{{ route('home') }}">المنتجات</a>
        <div class="dropdown">
            <button class="dropbtn">التصنيفات</button>
            <div class="dropdown-content">
                @foreach ($categories as $category)
                    <a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
    </nav>

    <header>
        <h1>منتجاتنا المميزة</h1>
    </header>

    <main>
        <h2>جميع المنتجات</h2>
        <div class="products-grid" id="productGrid">
            @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{ asset('storage/images/' . $product->image_url) }}" alt="صورة {{ $product->name }}">
                    <h2>{{ $product->name }}</h2>
                    <p>السعر: {{ $product->price }} شيكل</p>
                    <button>أضف للسلة</button>
                </div>
            @endforeach
        </div>
        
        <!-- زر "عرض المزيد" -->
        <button class="load-more-btn" id="loadMoreBtn">عرض المزيد</button>
    </main>

    <script>
        let productsPerPage = 8; // عدد المنتجات التي سيتم تحميلها في كل مرة
        let productsDisplayed = productsPerPage; // المنتجات المعروضة في البداية
    
        document.getElementById("loadMoreBtn").addEventListener("click", function() {
            productsDisplayed += productsPerPage; // زيادة عدد المنتجات المعروضة
            fetchProducts(productsDisplayed); // استدعاء دالة جلب المزيد من المنتجات
        });
    
        function fetchProducts(count) {
            fetch('/load-more-products?count=' + count)  // إرسال الطلب إلى السيرفر
                .then(response => response.json())  // انتظار الاستجابة
                .then(data => {
                    const productGrid = document.getElementById("productGrid");
    
                    // إضافة المنتجات الجديدة إلى الشبكة
                    data.products.forEach(product => {
                        const productCard = document.createElement('div');
                        productCard.classList.add('product-card');
                        productCard.innerHTML = `
                            <img src="{{ asset('storage/images') }}/${product.image_url}" alt="صورة ${product.name}">
                            <h2>${product.name}</h2>
                            <p>السعر: ${product.price} شيكل</p>
                            <button>أضف للسلة</button>
                        `;
                        productGrid.appendChild(productCard); // إضافة المنتج إلى الشبكة
                    });
                })
                .catch(error => {
                    console.error("حدث خطأ:", error); // التأكد من الخطأ إذا ظهر
                });
        }
    </script>
    
</body>
</html>
