<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ Дашборд - АШИД СОФТ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/70cd87d56f.js" crossorigin="anonymous"></script>
    <style>
        body { background-color: #f8f9fa; font-family: sans-serif; }
        .sidebar { height: 100vh; width: 260px; position: fixed; top: 0; left: 0; background-color: #1e293b; padding-top: 20px; color: #fff; z-index: 100; }
        .sidebar .nav-link { color: #cbd5e1; padding: 12px 20px; display: block; text-decoration: none; transition: 0.2s; font-size: 14px; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background-color: rgb(215, 115, 29); color: white; border-radius: 4px; margin: 0 10px; }
        .main-content { margin-left: 260px; padding: 30px; }
        .card-box { background: white; border-radius: 8px; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 25px; }
        .border-warning-custom { border-left: 4px solid rgb(215, 115, 29) !important; }
        .border-success-custom { border-left: 4px solid #10b981 !important; }
        .border-info-custom { border-left: 4px solid #3b82f6 !important; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="px-4 mb-4">
        <h4 class="font-weight-bold" style="color: rgb(215, 115, 29); margin-bottom: 5px; letter-spacing: 1px;">ASHID SOFT</h4>
        <span class="text-muted small">
            <i class="fa-solid fa-circle text-success mr-1" style="font-size: 10px;"></i> 
            {{ Auth::check() ? Auth::user()->name : 'Администратор' }}
        </span>
    </div>
    <hr style="border-color: #334155; margin: 10px 0;">
    <nav class="mt-3">
        <a href="{{ route('admin.dashboard') }}" class="nav-link active"><i class="fa-solid fa-chart-pie mr-2"></i> Хянах самбар</a>
        <a href="{{ route('admin-partner-list') }}" class="nav-link"><i class="fa-solid fa-handshake mr-2"></i> Хамтран ажиллагсад (Лого)</a>
        <a href="{{ route('admin-users-list') }}" class="nav-link"><i class="fa-solid fa-users mr-2"></i> Системийн хэрэглэгчид</a>
        <a href="#" class="nav-link"><i class="fa-solid fa-envelope mr-2"></i> Ирсэн зурвасууд (Contact)</a>
        
        <hr style="border-color: #334155; margin: 20px 0;">
        
        <a href="{{ route('logout') }}" class="nav-link text-danger" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-right-from-bracket mr-2"></i> Системээс гарах
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </nav>
</div>

<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Сайн байна уу, {{ Auth::check() ? Auth::user()->name : 'Админ' }}!</h2>
        <span class="badge badge-secondary p-2" style="font-size: 13px;">Өнөөдрийн огноо: {{ date('Y-m-d') }}</span>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card-box border-warning-custom">
                <h6 class="text-muted text-uppercase small font-weight-bold">Ирсэн нийт зурвас</h6>
                <div class="d-flex justify-content-between align-items-center">
                    <h3>24 ш</h3>
                    <i class="fa-solid fa-envelope fa-2x text-warning opacity-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box border-success-custom">
                <h6 class="text-muted text-uppercase small font-weight-bold">Түнш байгууллагууд</h6>
                <div class="d-flex justify-content-between align-items-center">
                    <h3>18 лого</h3>
                    <i class="fa-solid fa-handshake fa-2x text-success opacity-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box border-info-custom">
                <h6 class="text-muted text-uppercase small font-weight-bold">Админ хэрэглэгчид</h6>
                <div class="d-flex justify-content-between align-items-center">
                    <h3>3 гишүүн</h3>
                    <i class="fa-solid fa-users-gear fa-2x text-primary opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card-box">
                <h4 class="mb-3 font-weight-bold" style="color: #1e293b;">
                    <i class="fa-solid fa-plus-circle text-success mr-2"></i>Хамтран ажиллагч нэмэх
                </h4>
                <p class="text-muted small">Энд оруулах лого болон холбоос нь нүүр хуудасны "Хамтран ажиллагсад" хэсэгт динамикаар нэмэгдэнэ.</p>
                
                <form action="{{ route('admin-partner-store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label class="small font-weight-bold">Байгууллагын нэр</label>
                        <input type="text" class="form-control" name="name" placeholder="Жишээ: АШИД ДЕНТАЛ" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="small font-weight-bold">Вэбсайт линк (URL)</label>
                        <input type="url" class="form-control" name="link" placeholder="https://example.com">
                    </div>
                    
                    <div class="form-group">
                        <label class="small font-weight-bold">Байгууллагын лого (Зураг)</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="partnerLogo" name="logo" required>
                            <label class="custom-file-label" for="partnerLogo">Лого сонгох...</label>
                        </div>
                        <small class="form-text text-muted">Зөвшөөрөгдөх формат: PNG, JPG, SVG</small>
                    </div>
                    
                    <button type="submit" class="btn btn-sm text-white px-4 py-2 mt-2" style="background-color: rgb(215, 115, 29); border-radius: 4px;">
                        <i class="fa-solid fa-save mr-1"></i> Лого хадгалах
                    </button>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card-box">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="font-weight-bold" style="color: #1e293b;">
                        <i class="fa-solid fa-envelope-open-text text-primary mr-2"></i>Сүүлд ирсэн зурвасууд
                    </h4>
                    <span class="badge badge-primary">Шинэ хандалт</span>
                </div>
                <p class="text-muted small">Нүүр хуудасны Contact хэсгээс хэрэглэгчдийн илгээсэн мэдээллүүд.</p>
                
                <div class="list-group mt-4">
                    <div class="list-group-item list-group-item-action flex-column align-items-start border-left-warning-custom mb-2 shadow-sm">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 font-weight-bold">Бат-Эрдэнэ (bat@gmail.com)</h6>
                            <small class="text-muted">Өнөөдөр</small>
                        </div>
                        <p class="mb-1 small text-secondary">"Танай софтыг байгууллага дээрээ туршиж үзэх хүсэлтэй байна. Үнийн санал илгээнэ үү..."</p>
                        <small class="text-primary font-weight-bold">Утас: 99112233</small>
                    </div>

                    <div class="list-group-item list-group-item-action flex-column align-items-start border-left-warning-custom shadow-sm">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 font-weight-bold">Сувд-Эрдэнэ (suvd@yahoo.com)</h6>
                            <small class="text-muted">Өчигдөр</small>
                        </div>
                        <p class="mb-1 small text-secondary">"Вэбсайт хөгжүүлэлтийн үйлчилгээ сонирхож байна. Буцаж холбогдоорой."</p>
                        <small class="text-primary font-weight-bold">Утас: 88005566</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</body>
</html>