# 🛰️ Painel de Supervisão

Projeto simples, direto e funcional para monitoramento em tempo real de sensores, com alertas visuais, gráficos e autenticação via login. Ideal como MVP para sistemas de IoT, supervisão de produção, TI ou ambientes críticos.

---

## 🚀 Funcionalidades

- ✅ Autenticação com login e hash seguro
- 📊 Visualização de sensores com status em tempo real
- ⚠ Alertas visuais para valores críticos
- 📈 Gráfico de temperatura simulada com Chart.js
- ⏱️ Relógio em tempo real
- 🔄 Atualização automática a cada 5 segundos
- 🧪 Botão de teste de conexão com base de dados
- 🧼 Estrutura limpa em MVC: `models/`, `controllers/`, `views/`

---

## 🛠️ Tecnologias

- PHP 8+
- MySQL / MariaDB
- Bootstrap 5
- Chart.js
- JavaScript puro (sem jQuery 👀)
- Estrutura MVC artesanal (sem framework)

---

## 📁 Estrutura de Pastas

/painel-supervisao/
│
├── config/
│ └── config.php # Dados da base
│
├── controllers/
│ └── AlertController.php # Lógica dos alertas
│
├── models/
│ └── Sensor.php # Interação com a base de dados
│
├── views/
│ └── dashboard.php # Painel principal
│
├── index.php # Tela de login
├── dashboard.php # Redireciona após login
├── logout.php # Destroi sessão
├── test_db.php # Teste de conexão DB
└── README.md

yaml
Copy
Edit

---

## 🔐 Acesso ao Painel

- **Usuário padrão**: `admin`  
- **Senha padrão**: `123456` (armazenada com hash)

> Obs: usuário e senha devem existir na tabela `users`.

---

## 📦 Instalação

1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/painel-supervisao.git
Configure o banco de dados

Crie a base no MySQL

Importe o SQL (opcional: criar script)

Atualize o config/config.php com suas credenciais

Gere o hash da senha (uma vez)

php
Copy
Edit
echo password_hash('123456', PASSWORD_DEFAULT);
Inicie o servidor local (PHP embutido):

bash
Copy
Edit
php -S localhost:8000
Acesse http://localhost:8000

🧪 Testar Conexão com o DB
No topo direito do painel há um botão DB Test. Ele executa um teste rápido de conexão com a base de dados e retorna uma resposta imediata (Conectado com sucesso ou Erro na conexão).

🧠 Ideias futuras
AJAX para atualizar dados sem reload

WebSocket para comunicação em tempo real

Tela de admin para gerenciar sensores

Gravação de histórico e exportação de logs

👨‍💻 Autor
Desenvolvido por Altamir Rodrigues!!!!
Programador fullstack, fleumático e apaixonado por resolver problemas com código limpo e soluções diretas.

📄 Licença
MIT — Livre para usar, estudar e adaptar. Só não vale vender como se fosse seu. 😉
🚀