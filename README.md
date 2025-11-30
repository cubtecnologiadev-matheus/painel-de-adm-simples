# 🔐 Painel de ADM Simples – Gerenciamento de Acessos (PHP)

Este projeto é um **painel administrativo simples**, desenvolvido para gerenciar acessos de clientes usando **PHP**, **JSON**, e **sessões (login/logout)**. Ideal para quem precisa de **um sistema rápido e funcional para autenticação e controle de usuários**.

---

## ⚙️ Funcionalidades

✔ Login de usuário  
✔ Autenticação com sessão PHP  
✔ Geração automática de chaves/códigos (`gerar.php`)  
✔ Registro de logs em arquivo `.txt`  
✔ Painel administrativo (`painel.php`)  
✔ Logout de sessão  
✔ Arquivo de configuração (`conexao.php`)  

---

## 🛠️ Tecnologias Utilizadas

| Tecnologia | Finalidade |
|------------|------------|
| **PHP** | Backend e autenticação |
| **JSON / TXT** | Simulação de banco de dados |
| **HTML / CSS** | Estrutura e estilo visual |
| **JavaScript** | Interatividade do painel |

---

## 📂 Estrutura do Projeto

painel-de-adm-simples/
├── index.php # Tela de login
├── login.php # Verificação dos dados
├── painel.php # Painel principal
├── gerar.php # Geração de acesso
├── acao.php # Funções de ação
├── conexao.php # Configuração
├── logout.php # Finaliza sessão
├── log.txt # Histórico de acessos

yaml
Copiar código

---

## 🚀 Como Usar (Localmente)

1. Instale o **XAMPP** ou **WAMP**
2. Copie o projeto para a pasta `htdocs`
3. Inicie o Apache
4. Acesse no navegador:

http://localhost/painel-de-adm-simples/

yaml
Copiar código

---

## 📌 Melhorias Futuras (To-Do)

- [ ] Migrar para **MySQL** usando PDO  
- [ ] Criar sistema de níveis de acesso (admin / cliente)  
- [ ] Criar painel responsivo com Bootstrap ou Tailwind  
- [ ] Sistema de cadastro e recuperação de senha  

---

## 👨‍💻 Autor

**Matheus – Cub Tecnologia Dev**  
💼 Desenvolvimento Web | PHP | Projetos Sob Medida  
📧 cubtecnologia.dev@gmail.com

---

💡 *Projeto criado para estudo e portfólio profissional. Pode ser usado como base para dashboards reais!*  
