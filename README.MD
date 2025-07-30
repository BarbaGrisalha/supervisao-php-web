# 🛰️ Painel de Supervisão

Sistema simples, direto ao ponto e funcional para **monitoramento em tempo real** de sensores, com autenticação, alertas visuais, gráficos dinâmicos e estrutura em MVC. Ideal como **MVP** para projetos de IoT, supervisão industrial, ambientes críticos de TI ou sistemas de produção.

---

## 🚀 Funcionalidades

- ✅ Autenticação com login e senha criptografada (hash seguro)
- 📊 Visualização de sensores com leitura em tempo real
- ⚠️ Alertas visuais para valores críticos (ex: temperatura alta)
- 📈 Gráfico de temperatura com [Chart.js](https://www.chartjs.org/)
- ⏱️ Relógio atualizado dinamicamente
- 🔄 Refresh automático da página a cada 5 segundos
- 🧪 Teste rápido de conexão com o banco de dados
- 🧼 Estrutura limpa em MVC (`models/`, `controllers/`, `views/`)

---

## 🛠️ Tecnologias Utilizadas

- **PHP 8+**
- **MySQL / MariaDB**
- **Bootstrap 5**
- **Chart.js**
- **JavaScript Vanilla** (sem jQuery 👌)
- Estrutura MVC artesanal (sem frameworks)

---

## 📁 Estrutura de Diretórios

/painel-supervisao/
│
├── config/
│ └── config.php # Configuração da base de dados
│
├── controllers/
│ └── AlertController.php # Lógica dos alertas
│
├── models/
│ └── Sensor.php # Conexão e queries do sensor
│
├── views/
│ └── dashboard.php # Painel principal com gráfico
│
├── assets/
│ └── js/
│ ├── chart-handler.js # Atualização do gráfico e relógio
│ └── teste_db.js # Teste da conexão com o DB
│
├── index.php # Página de login
├── dashboard.php # Página principal após login
├── logout.php # Encerrar sessão
├── test_db.php # Endpoint para testar DB
└── README.md # Este arquivo


---

## 🔐 Credenciais de Acesso (Padrão)

| Usuário | Senha  |
|--------|--------|
| `admin` | `123456` |

> **Atenção:** o usuário deve existir na tabela `users`, e a senha deve estar armazenada com `password_hash()`.

---

## 📦 Como Instalar

### 1. Clone o projeto

```bash
git clone https://github.com/seu-usuario/painel-supervisao.git
cd painel-supervisao

2. Configure o banco de dados
Crie a base no MySQL/MariaDB

Importe um script SQL com a estrutura (ou crie manualmente)

Edite config/config.php com suas credenciais

3. Gere o hash da senha

php -r "echo password_hash('123456', PASSWORD_DEFAULT);"

4. Rode o servidor local

php -S localhost:8000

5. Acesse no navegador
http://localhost:8000

🧪 Teste de Conexão com o DB
Na interface do painel (topo direito), existe o botão "DB Test". Ele dispara uma chamada para test_db.php e exibe o status da conexão com o banco de dados:

✅ Conectado com sucesso

❌ Erro de conexão

🧠 Próximos Passos (To-Do)
🔁 Substituir reload da página por AJAX

📡 Integração com WebSocket para tempo real de verdade

🛠️ Tela de administração para CRUD de sensores

📝 Gravação de histórico e exportação de logs

👨‍💻 Autor
Altamir Rodrigues
Programador fullstack, fleumático, e especialista em entregar soluções limpas, sem enrolação e com foco total em resolver problemas reais.

LinkedIn | GitHub | Portfólio

📄 Licença
Licença MIT. Pode usar, modificar, adaptar.
Só não vale sair vendendo como se fosse seu — aí é sacanagem. 😉

