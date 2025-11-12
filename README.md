# 🏋️‍♂️ ClientFitness — PHP + MySQL + Power BI

**Sistema completo de cadastro e acompanhamento de treinos**, feito em PHP com MySQL e integração pronta para análise de dados no Power BI.

---

## 🚀 Tecnologias usadas
- 🐘 **PHP 8+ (XAMPP)**
- 💾 **MySQL** (dump incluso em `database.sql`)
- 💻 **HTML + CSS**
- 📊 **Power BI** (para dashboards analíticos)

---

## 📂 Estrutura do projeto

clientfitness/
├── app/
│ └── db.php # conexão MySQL
├── partials/
│ └── nav.php # menu superior
├── database.sql # dump do banco (clients + workouts)
├── index.php # dashboard + filtros
├── clients.php # lista clientes
├── client_create.php # adicionar cliente
├── client_edit.php # editar cliente
├── client_delete.php # excluir cliente
├── workout_create.php # adicionar treino
├── workout_edit.php # editar treino
├── workout_delete.php # excluir treino
└── styles.css # estilo base


---

## 🧩 Como rodar localmente
1️⃣ Instale e inicie o **XAMPP** (Apache + MySQL).  
2️⃣ Copie este projeto para:


3️⃣ No **MySQL Workbench**:
- Vá em **Server → Data Import**
- Escolha **Import from Self-Contained File**
- Selecione `database.sql`
- Clique em **Start Import**

4️⃣ Abra no navegador:
http://localhost/clientfitness/


---

## 📊 Power BI (opcional)
Você pode conectar o banco `portfolio_db` no Power BI:

1. **Obter Dados → Banco de Dados MySQL**
2. Servidor: `localhost`
3. Banco: `portfolio_db`
4. Importar tabelas `clients` e `workouts`
5. Criar relações e visuais:
   - 🧍 Treinos por cliente  
   - ⏱️ Minutos totais  
   - 💪 Modalidades mais praticadas  
   - ❤️ Média de RPE (esforço percebido)

---

## 🌐 Deploy local
Projeto roda 100% localmente com XAMPP.
Ideal para demonstrar CRUD + MySQL + análise de dados (Power BI).

---

## 🧑‍💻 Autor
**Augusto Cezar de Macedo Doso**  
💼 [LinkedIn](https://www.linkedin.com/in/augusto-cezar-de-macedo-doso-38b83537b)  
🐙 [GitHub](https://github.com/augustodoso)  

---

## 🪪 Licença
Licenciado sob a [MIT License](LICENSE).
