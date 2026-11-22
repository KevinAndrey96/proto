# Turnkey Promotional Sweepstakes & Code Verification Web Template

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
- **Participant Registration**: Clean customer onboarding capture with legal terms and privacy policy agreement (`Registro.php`, `Terminos.html`).
- **Dynamic Transition States**: Animated loading spinners and progress screens ensuring smooth user experience over mobile connections (`Cargando.php`).
- **Transactional Notifications**: Integrated PHPMailer module for instant confirmation emails to winning participants.
- **Environment-Aware PDO Layer**: Centralized PDO connector (`Tools/BD/PDO.php`) dynamically reading environment variables with local fallbacks.

---

## 🏗️ Architecture & Component Topology

```
+-------------------------------------------------------------+
|                     Participant Browser                     |
+-------------------------------------------------------------+
                              | HTTP (Port 8090)
                              v
+-------------------------------------------------------------+
|                 Apache Web Server (PHP 8.1)                 |
|  - Landing Page & Code Submission (index.php, Codigo.php)   |
|  - Participant Registration & Identity (Registro.php)       |
|  - Dynamic Reveal & Celebration Engine (Resultado.php)      |
|  - Data Access Abstraction (Tools/BD/PDO.php)               |
+-------------------------------------------------------------+
                              | TCP / MySQL protocol
                              v
+-------------------------------------------------------------+
|              Database Service (MariaDB 10.11)               |
|  - Schema: proto_concurso                                   |
|  - Promo codes, redemption timestamps, participant records  |
+-------------------------------------------------------------+
```

---

## 🚀 Quick Start with Docker Compose

Run the promotional sweepstakes portal locally in seconds:

### 1. Clone the Repository
```bash
git clone git@github.com-personal:KevinAndrey96/proto.git
cd proto
```

### 2. Launch the Stack
```bash
docker compose up -d
```

### 3. Access the Application
- **Promotional Landing**: [http://localhost:8090](http://localhost:8090)
- **Code Entry**: [http://localhost:8090/Codigo.php](http://localhost:8090/Codigo.php)
- **Legal Terms & Conditions**: [http://localhost:8090/Terminos.html](http://localhost:8090/Terminos.html)

---

## 💻 Manual Deployment (LAMP / cPanel / Shared Hosting)

1. Upload all repository files to your server web root (`public_html/` or `/var/www/html/`).
2. Create a MySQL database and user.
3. Configure your database settings in `Tools/BD/PDO.php` or export environment variables:
   ```ini
   DB_HOST="localhost"
   DB_NAME="proto_concurso"
   DB_USER="your_db_user"
   DB_PASSWORD="your_db_password"
   ```
4. Seed your promotional batch codes table and launch your campaign.

---

## 🛡️ License

Maintained for developer portfolio demonstration and production turnkey website deployment.
