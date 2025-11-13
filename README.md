# 🏋️‍♂️ ClientFitness — PHP + MySQL + Power BI

Sistema de cadastro e acompanhamento de treinos para clientes de personal trainer, desenvolvido em **PHP + MySQL**, com banco pronto para ser consumido em ferramentas de BI (como **Power BI**).

---

## 🚀 Tecnologias usadas

- 🐘 PHP (XAMPP)
- 💾 MySQL (dump em `database.sql`)
- 🌐 HTML + CSS (vanilla)
- 📊 Power BI (integração opcional)

---

## 📂 Estrutura do projeto

```text
clientfitness/
├── app/
│   └── db.php              # conexão MySQL
├── partials/
│   └── nav.php             # menu superior
├── database.sql            # dump do banco (schema + dados de exemplo)
├── index.php               # dashboard + filtros
├── clients.php             # lista de clientes
├── client_create.php       # criação de cliente
├── client_edit.php         # edição de cliente
├── client_delete.php       # remoção de cliente
├── workout_create.php      # criação de treino
├── workout_edit.php        # edição de treino
├── workout_delete.php      # remoção de treino
└── styles.css              # estilos básicos
```

---

## 🧩 Como rodar localmente (XAMPP + MySQL)

1. **Iniciar o XAMPP**
   - Abra o XAMPP Control Panel.
   - Inicie os módulos **Apache** e **MySQL**.

2. **Colocar o projeto na pasta do servidor**
   - Copie a pasta inteira do projeto para:
     ```text
     C:\xampp\htdocs\clientfitness\
     ```

3. **Importar o banco de dados com o MySQL Workbench**
   - Abra o **MySQL Workbench**.
   - Vá em **Server → Data Import**.
   - Selecione **Import from Self-Contained File** e escolha o arquivo:
     ```text
     database.sql
     ```
   - Marque o schema de destino (por exemplo `portfolio_db`) ou deixe para ser criado pelo próprio script.
   - Clique em **Start Import**.

4. **Acessar a aplicação**
   - No navegador, acesse:
     ```text
     http://localhost/clientfitness/
     ```

---

## 📊 Integração com Power BI (opcional)

1. Abra o **Power BI Desktop**.
2. Clique em **Obter Dados → Banco de Dados MySQL**.
3. Use as configurações (padrão XAMPP):
   - Servidor: `localhost`
   - Banco de dados: `portfolio_db`
   - Usuário: `root`
   - Senha: *(vazia, se você não configurou nenhuma)*.
4. Selecione as tabelas:
   - `clients`
   - `workouts`
5. Crie o relacionamento:
   - `workouts.client_id` → `clients.id`
6. Exemplos de visuais:
   - Treinos por cliente.
   - Minutos totais de treino.
   - Modalidade mais praticada.
   - RPE médio dos treinos.

---

## 🌱 Ideias de evolução

- Autenticação (login de administrador).
- Campo de objetivo do cliente (ganho de massa, perda de gordura, performance etc.).
- Exportação de treinos para CSV/Excel.
- Dashboard pronto em Power BI incluído na pasta `bi/` com o arquivo `.pbix`.

---

## 👤 Autor

**Augusto Cezar de Macedo Doso**

- 💼 [LinkedIn](https://www.linkedin.com/in/augusto-cezar-de-macedo-doso-38b83537b)
- 🐙 [GitHub](https://github.com/augustodoso)

---

## 🪪 Licença

Licenciado sob a [MIT License](LICENSE).
