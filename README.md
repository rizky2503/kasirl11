# Kasir Laravel 11 - Sistem Point of Sale

Sistem Point of Sale (POS) modern berbasis web yang dibangun dengan Laravel 11 dan Livewire 3.6. Aplikasi kasir ini menyediakan fitur lengkap untuk mengelola produk, transaksi, inventaris, dan menghasilkan laporan.

## 🚀 Fitur

### Fungsi Inti
- **Manajemen Produk**: Menyelesaikan operasi CRUD untuk produk dengan fungsi impor Excel
- **Pemrosesan Transaksi**: Penanganan transaksi real-time dengan fungsi keranjang
- **Manajemen Inventaris**: Pelacakan dan manajemen stok
- **Manajemen Pengguna**: Kontrol akses berbasis peran (Admin/Pengguna)
- **Sistem Pelaporan**: Laporan dan analisis transaksi
- **Dasbor**: Ikhtisar status penjualan dan inventaris

### Fitur Teknis
- **Pembaruan Waktu Nyata**: Komponen reaktif bertenaga Livewire
- **Impor Excel**: Impor produk massal melalui file Excel
- **Desain Responsif**: Antarmuka ramah seluler
- **Otentikasi**: Sistem login aman dengan manajemen peran
- **UI Modern**: Antarmuka pengguna yang bersih dan intuitif

## 🛠 Tumpukan Teknologi

- **Backend**: Laravel 11
- **Depan**: Livewire 3.6, Vite, Templat Blade
- **Basis Data**: MySQL
- **Otentikasi**: Laravel Sanctum
- **Pemrosesan File**: Situs web Maat Excel
- **Alat Pengembangan**: Komposer, NPM, PHPUnit

## 📋 Prasyarat

Sebelum menjalankan aplikasi ini, pastikan Anda sudah menginstal yang berikut ini:

-PHP >= 8.1
- Komposer
- Node.js & NPM
- Basis Data MySQL
- Git

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone <your-repository-url>
cd kasirl11
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Install Node.js Dependencies
```bash
npm install
```

### 4. Environment Configuration
```bash
cp .env.example .env
```

Update your `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kasir_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Run Database Migrations
```bash
php artisan migrate
```

### 7. Seed the Database (Optional)
```bash
php artisan db:seed
```

### 8. Build Frontend Assets
```bash
npm run build
# For development
npm run dev
```

### 9. Start the Application
```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## 📊 Database Schema

### Users Table
- `id`, `name`, `email`, `password`, `peran` (role), `timestamps`

### Produk Table
- `id`, `kode`, `nama`, `harga`, `stok`, `timestamps`

### Transaksi Table
- `id`, `kode`, `total`, `status`, `timestamps`

### DetilTransaksi Table
- `id`, `transaksi_id`, `produk_id`, `jumlah`, `timestamps`

## 🎯 Key Components

### Livewire Components

#### Transaksi Component
- **Location**: `app/Livewire/Transaksi.php`
- **Features**:
  - Create new transactions
  - Add/remove products from cart
  - Calculate totals and change
  - Complete/cancel transactions
  - Real-time stock updates

#### Produk Component
- **Location**: `app/Livewire/Produk.php`
- **Features**:
  - Product CRUD operations
  - Excel import functionality
  - Stock management
  - Product search and filtering

#### User Component
- **Location**: `app/Livewire/User.php`
- **Features**:
  - User management
  - Role-based access control
  - Admin-only features

#### Laporan Component
- **Location**: `app/Livewire/Laporan.php`
- **Features**:
  - Transaction reporting
  - Sales analytics
  - Export functionality

## 🔐 User Roles

### Admin Role
- Full access to all features
- Product management
- User management
- System configuration
- Report generation

### User Role
- Transaction processing
- View products
- Limited access to reports

## 📱 Usage

### Creating a Transaction
1. Navigate to the Transaction page
2. Click "Transaksi Baru" to start a new transaction
3. Scan or enter product code
4. Enter payment amount
5. Complete the transaction

### Managing Products
1. Go to Product Management
2. Add new products manually or via Excel import
3. Edit product details (name, code, price, stock)
4. Delete products when necessary

### Generating Reports
1. Access the Reports section
2. View transaction history
3. Filter by date range
4. Export reports if needed

## 🧪 Testing

Run the test suite:
```bash
php artisan test
```

## 📁 Project Structure

```
kasirl11/
├── app/
│   ├── Http/Controllers/     # Controllers
│   ├── Livewire/             # Livewire components
│   ├── Models/               # Eloquent models
│   └── Imports/              # Excel import classes
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
├── resources/
│   ├── views/                # Blade templates
│   ├── css/                  # Stylesheets
│   └── js/                   # JavaScript files
├── routes/
│   ├── web.php               # Web routes
│   └── api.php               # API routes
└── storage/                  # File storage
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 Support

For support, please contact the development team or create an issue in the repository.

## 🔄 Updates

To update the application:
```bash
composer update
npm update
php artisan migrate
```

## 📊 Performance

The application is optimized for:
- Fast transaction processing
- Real-time inventory updates
- Responsive user interface
- Efficient database queries

---

**Built with ❤️ using Laravel 11 & Livewire 3.6**
