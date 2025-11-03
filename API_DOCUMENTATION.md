# API Documentation - Sistem Antrian RS

## Base URL
```
http://localhost:8000/api
```

## Endpoints

### 1. Loket Endpoints

#### GET /api/lokets
Mendapatkan daftar semua loket

**Response:**
```json
[
  {
    "id": 1,
    "nama_loket": "Pendaftaran Umum",
    "deskripsi": "Loket untuk pendaftaran pasien umum",
    "kode": "A",
    "created_at": "2025-11-03T07:00:00.000000Z",
    "updated_at": "2025-11-03T07:00:00.000000Z"
  }
]
```

#### POST /api/lokets
Membuat loket baru

**Request Body:**
```json
{
  "nama_loket": "Poli Gigi",
  "deskripsi": "Loket untuk poli gigi",
  "kode": "B"
}
```

**Response:** (201 Created)
```json
{
  "id": 2,
  "nama_loket": "Poli Gigi",
  "deskripsi": "Loket untuk poli gigi",
  "kode": "B",
  "created_at": "2025-11-03T07:00:00.000000Z",
  "updated_at": "2025-11-03T07:00:00.000000Z"
}
```

#### GET /api/lokets/{id}
Mendapatkan detail loket tertentu

**Response:**
```json
{
  "id": 1,
  "nama_loket": "Pendaftaran Umum",
  "deskripsi": "Loket untuk pendaftaran pasien umum",
  "kode": "A",
  "created_at": "2025-11-03T07:00:00.000000Z",
  "updated_at": "2025-11-03T07:00:00.000000Z"
}
```

#### PUT /api/lokets/{id}
Update loket

**Request Body:**
```json
{
  "nama_loket": "Pendaftaran VIP",
  "deskripsi": "Loket untuk pendaftaran pasien VIP",
  "kode": "A"
}
```

#### DELETE /api/lokets/{id}
Hapus loket

**Response:** (204 No Content)

---

### 2. Antrian Endpoints

#### GET /api/antrians
Mendapatkan daftar antrian (dengan filter opsional)

**Query Parameters:**
- `loket_id` (optional): Filter berdasarkan loket
- `status` (optional): Filter berdasarkan status (menunggu/dipanggil/selesai)

**Example:**
```
GET /api/antrians?loket_id=1&status=menunggu
```

**Response:**
```json
[
  {
    "id": 1,
    "loket_id": 1,
    "nomor_antrian": "A001",
    "status": "menunggu",
    "waktu_panggil": null,
    "created_at": "2025-11-03T08:00:00.000000Z",
    "updated_at": "2025-11-03T08:00:00.000000Z",
    "loket": {
      "id": 1,
      "nama_loket": "Pendaftaran Umum",
      "kode": "A"
    }
  }
]
```

#### POST /api/antrians
Mengambil nomor antrian baru (otomatis generate nomor)

**Request Body:**
```json
{
  "loket_id": 1
}
```

**Response:** (201 Created)
```json
{
  "id": 5,
  "loket_id": 1,
  "nomor_antrian": "A005",
  "status": "menunggu",
  "waktu_panggil": null,
  "created_at": "2025-11-03T08:30:00.000000Z",
  "updated_at": "2025-11-03T08:30:00.000000Z"
}
```

**Cara Kerja Generate Nomor:**
- Format: `{KODE_LOKET}{NOMOR_URUT}`
- Contoh: A001, A002, B001, B002
- Nomor urut reset setiap hari
- Otomatis increment berdasarkan antrian terakhir hari ini

#### GET /api/antrians/{id}
Mendapatkan detail antrian tertentu

**Response:**
```json
{
  "id": 1,
  "loket_id": 1,
  "nomor_antrian": "A001",
  "status": "dipanggil",
  "waktu_panggil": "2025-11-03T08:15:00.000000Z",
  "created_at": "2025-11-03T08:00:00.000000Z",
  "updated_at": "2025-11-03T08:15:00.000000Z",
  "loket": {
    "id": 1,
    "nama_loket": "Pendaftaran Umum",
    "kode": "A"
  }
}
```

#### PUT /api/antrians/{id}
Update status antrian (panggil atau selesai)

**Request Body:**
```json
{
  "status": "dipanggil"
}
```

**Response:**
```json
{
  "id": 1,
  "loket_id": 1,
  "nomor_antrian": "A001",
  "status": "dipanggil",
  "waktu_panggil": "2025-11-03T08:15:00.000000Z",
  "created_at": "2025-11-03T08:00:00.000000Z",
  "updated_at": "2025-11-03T08:15:00.000000Z"
}
```

**Status Values:**
- `menunggu`: Antrian baru, belum dipanggil
- `dipanggil`: Sedang dilayani (otomatis set waktu_panggil)
- `selesai`: Sudah selesai dilayani

#### DELETE /api/antrians/{id}
Hapus antrian

**Response:** (204 No Content)

#### GET /api/antrians/dipanggil
Mendapatkan antrian yang sedang dipanggil

**Query Parameters:**
- `loket_id` (optional): Filter berdasarkan loket tertentu

**Example:**
```
GET /api/antrians/dipanggil
GET /api/antrians/dipanggil?loket_id=1
```

**Response:**
```json
{
  "data": [
    {
      "id": 1,
      "loket_id": 1,
      "nomor_antrian": "A001",
      "status": "dipanggil",
      "waktu_panggil": "2025-11-03T08:15:00.000000Z",
      "created_at": "2025-11-03T08:00:00.000000Z",
      "updated_at": "2025-11-03T08:15:00.000000Z",
      "loket": {
        "id": 1,
        "nama_loket": "Pendaftaran Umum",
        "deskripsi": "Loket untuk pendaftaran pasien umum",
        "kode": "A"
      }
    }
  ]
}
```

---

## Error Responses

### 404 Not Found
```json
{
  "message": "No query results for model [App\\Models\\Loket] 999"
}
```

### 422 Validation Error
```json
{
  "message": "The kode field is required.",
  "errors": {
    "kode": [
      "The kode field is required."
    ]
  }
}
```

### 500 Internal Server Error
```json
{
  "message": "Server Error"
}
```

---

## Testing dengan cURL

### Ambil nomor antrian baru
```bash
curl -X POST http://localhost:8000/api/antrians \
  -H "Content-Type: application/json" \
  -d '{"loket_id": 1}'
```

### Panggil antrian
```bash
curl -X PUT http://localhost:8000/api/antrians/1 \
  -H "Content-Type: application/json" \
  -d '{"status": "dipanggil"}'
```

### Selesaikan antrian
```bash
curl -X PUT http://localhost:8000/api/antrians/1 \
  -H "Content-Type: application/json" \
  -d '{"status": "selesai"}'
```

### Get antrian yang dipanggil
```bash
curl http://localhost:8000/api/antrians/dipanggil
```

---

## Database Schema

### Table: lokets
| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| nama_loket | varchar(255) | Nama loket (e.g., "Pendaftaran Umum") |
| deskripsi | text | Deskripsi loket |
| kode | varchar(1) | Kode loket (A, B, C, dst) - unique |
| created_at | timestamp | Waktu dibuat |
| updated_at | timestamp | Waktu diupdate |

### Table: antrians
| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| loket_id | bigint | Foreign key ke lokets |
| nomor_antrian | varchar(255) | Nomor antrian (e.g., "A001") |
| status | enum | Status: menunggu, dipanggil, selesai |
| waktu_panggil | timestamp | Waktu dipanggil (nullable) |
| created_at | timestamp | Waktu dibuat |
| updated_at | timestamp | Waktu diupdate |

---

## Flow Penggunaan

1. **Admin membuat loket** → POST /api/lokets
2. **Pasien ambil nomor** → POST /api/antrians (dengan loket_id)
3. **Sistem generate nomor otomatis** (A001, A002, dst)
4. **Petugas panggil antrian** → PUT /api/antrians/{id} (status: dipanggil)
5. **Display menampilkan antrian dipanggil** → GET /api/antrians/dipanggil
6. **Selesai dilayani** → PUT /api/antrians/{id} (status: selesai)
