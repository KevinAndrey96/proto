# Turnkey Promotional Sweepstakes & Code Verification Web Template (php-proto-promotional-campaign-portal)

[![PHP](https://img.shields.io/badge/PHP-8.1%20%7C%208.2-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net)
[![MariaDB](https://img.shields.io/badge/MariaDB-10.11-003545?style=for-the-badge&logo=mariadb&logoColor=white)](https://mariadb.org)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-Responsive-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![Docker](https://img.shields.io/badge/Docker-Compose-2496ED?style=for-the-badge&logo=docker&logoColor=white)](https://www.docker.com)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

A complete, production-ready turnkey web application template built for **consumer promotional campaigns**, **retail scratch-and-win contests**, **loyalty code verification portals**, and **instant sweepstakes events**. Engineered for high-speed unique promo code redemption with instant visual results, audio effects, and customer registration.

---

## 🌟 Key Highlights & Campaign Features

- **Unique Code Validation Engine**: Real-time validation of single-use promotional redemption codes (`Codigo.php`) with prevention of duplicate redemption attempts.
- **Instant Result Reveal**: Animated interactive result page (`Resultado.php`) featuring audio celebrations (`sounds/`) and reward tier determination.
- **Configurable Winning Codes**: Flexible validation supporting environment-based winning codes (`WINNING_CODE=WINNER`) and secure cryptographic hashes.
- **Participant Registration**: Clean customer onboarding capture with legal terms and privacy policy agreement (`Registro.php`, `Terminos.html`).
- **Dynamic Transition States**: Animated loading spinners and progress screens ensuring smooth user experience over mobile connections (`Cargando.php`).
- **Environment-Aware PDO Layer**: Centralized PDO connector (`Tools/BD/PDO.php`) dynamically reading environment variables with local fallbacks.
- **Automated Database Seeding**: Pre-configured schema and seed data in `database/schema.sql` automatically imported on container start.

---

## 🏗️ Architecture & Component Topology

```
+-------------------------------------------------------------+
|                     Participant Browser                     |
+-------------------------------------------------------------+
              | HTTP (Port 8092)           | HTTP (Port 8093)
              v                            v
+-----------------------------+   +---------------------------+
| Apache Web Server (PHP 8.1) |   |        phpMyAdmin         |
| - Landing & Staff Login     |   |   (Web Database Manager)  |
| - Participant Registration  |   +---------------------------+
| - Real-time Code Verifier   |                |
| - Audio Celebration Engine  |                |
+-----------------------------+                |
              | TCP (Port 3306)                |
              +-----------------+--------------+
                                |
                                v
+-------------------------------------------------------------+
|              Database Service (MariaDB 10.11)               |
| - Schema: proto_concurso                                    |
| - Auto-seeded tables: Users, Participants, Promo Codes      |
+-------------------------------------------------------------+
```

---

## 🚀 Quick Start with Docker Compose

Run the promotional sweepstakes portal locally in seconds:

### 1. Clone the Repository
```bash
git clone git@github.com-personal:KevinAndrey96/php-proto-promotional-campaign-portal.git
cd php-proto-promotional-campaign-portal
```

### 2. Configure Environment (Optional)
```bash
cp .env.example .env
```

### 3. Launch the Stack
```bash
docker compose up -d
```

### 4. Access the Application
| Service | URL | Default Credentials / Data | Description |
| :--- | :--- | :--- | :--- |
| **Acceso Operador / Staff** | [http://localhost:8092](http://localhost:8092) | `admin` / `admin123` | Login para registro de participantes |
| **Portal de Verificación** | [http://localhost:8092/LoginCode.php](http://localhost:8092/LoginCode.php) | Código de participante: `1001` | Pantalla de validación de código |
| **Código Ganador de Prueba** | Formulario de 6 casillas | `W - I - N - N - E - R` | Desbloquea celebración y premio |
| **Términos y Condiciones** | [http://localhost:8092/Terminos.html](http://localhost:8092/Terminos.html) | N/A | Bases legales del concurso |
| **phpMyAdmin** | [http://localhost:8093](http://localhost:8093) | User: `proto_user` / `proto_password` | Gestor de base de datos web |

---

## 💻 Manual Deployment (LAMP / cPanel / Shared Hosting)

1. Upload all repository files to your server web root (`public_html/` or `/var/www/html/`).
2. Create a MySQL database and user.
3. Import `database/schema.sql` into your database.
4. Configure your database settings in `Tools/BD/PDO.php` or export environment variables:
   ```ini
   DB_HOST="localhost"
   DB_NAME="proto_concurso"
   DB_USER="your_db_user"
   DB_PASSWORD="your_db_password"
   WINNING_CODE="WINNER"
   ```
5. Test participant onboarding and sweepstakes validation.

---

## 🛡️ License

Maintained for developer portfolio demonstration and production turnkey website deployment.
