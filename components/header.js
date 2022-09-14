const headerTemplate = document.createElement('template');
const currentNav = document.URL.split("/")[4];
const navLinks = ["covid.html", "record", "vaccines", "patients", "employees"];
var activeNav;

for (let i=0; i < navLinks.length; i++){
    if (currentNav == navLinks[i]){
        activeNav = currentNav;
    }
}

switch(activeNav) {
    case "covid.html":
        navList = `<li><a class="active" href="http://localhost/project/covid.html">Home</a></li>
            <li><a href="http://localhost/project/record/record.php">Record Vaccination</a></li>
            <li><a href="http://localhost/project/vaccines/vaccine.php">Vaccines</a></li>
            <li><a href="http://localhost/project/patients/patients.php">Patients</a></li>
            <li><a href="http://localhost/project/employees/workers.php">Employees</a></li>`;
            break;
    case "record":
        navList = `<li><a href="http://localhost/project/covid.html">Home</a></li>
            <li><a class="active" href="http://localhost/project/record/record.php">Record Vaccination</a></li>
            <li><a href="http://localhost/project/vaccines/vaccine.php">Vaccines</a></li>
            <li><a href="http://localhost/project/patients/patients.php">Patients</a></li>
            <li><a href="http://localhost/project/employees/workers.php">Employees</a></li>`;
            break;
    case "vaccines":
        navList = `<li><a href="http://localhost/project/covid.html">Home</a></li>
            <li><a href="http://localhost/project/record/record.php">Record Vaccination</a></li>
            <li><a class="active" href="http://localhost/project/vaccines/vaccine.php">Vaccines</a></li>
            <li><a href="http://localhost/project/patients/patients.php">Patients</a></li>
            <li><a href="http://localhost/project/employees/workers.php">Employees</a></li>`;
            break;
    case "patients":
        navList = `<li><a href="http://localhost/project/covid.html">Home</a></li>
            <li><a href="http://localhost/project/record/record.php">Record Vaccination</a></li>
            <li><a href="http://localhost/project/vaccines/vaccine.php">Vaccines</a></li>
            <li><a class="active" href="http://localhost/project/patients/patients.php">Patients</a></li>
            <li><a href="http://localhost/project/employees/workers.php">Employees</a></li>`;
            break;
    case "employees":
        navList = `<li><a href="http://localhost/project/covid.html">Home</a></li>
            <li><a href="http://localhost/project/record/record.php">Record Vaccination</a></li>
            <li><a href="http://localhost/project/vaccines/vaccine.php">Vaccines</a></li>
            <li><a href="http://localhost/project/patients/patients.php">Patients</a></li>
            <li><a class="active" href="http://localhost/project/employees/workers.php">Employees</a></li>`;
            break;  
    default:
        console.log("No active navigation found.")
        break; 
}

headerTemplate.innerHTML = `
  <style>
    header {
        display: flex;
        flex-direction: column;
    }
    section {
        background-image: url("http://localhost/project/img/covid.jpg");
        background-size: cover;
        background-position-y: 70%;
        position: relative;
        width: 100%;
        height: 130px;
        display: flex;
        align-items: center;
    }
    h1 {
        color: white;
        background: rgba(0, 140, 255, 0.9);
        padding: 15px 15px;
        margin: 10px 0px;
        text-align: center;
        width: 100%;
        display: block; 
    }
    nav {
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f1f1f1;
    }
    ul {
        padding: 0;
    }   
    ul li {
        list-style: none;
        display: inline;
    }
    a {
        font-weight: 700;
        margin: 0 25px;
        color: #000;
        text-decoration: none;
    }
    a:hover {
        padding-bottom: 5px;
        box-shadow: inset 0 -2px 0 0 #B8B8B8;
    }
    a.active {
        padding-bottom: 5px;
        box-shadow: inset 0 -2px 0 0 #008CFF;
        color: black;
    }
  </style>
  <header>
    <section>
        <h1>Covid Vaccination Database</h1>
    </section>
    <nav>
      <ul>
        ` + navList + `
      </ul>
    </nav>
  </header>
`;
class Header extends HTMLElement {
    constructor() {
        super();
    }
    connectedCallback() {
        const shadowRoot = this.attachShadow({ mode: 'closed' });

        shadowRoot.appendChild(headerTemplate.content);
    }
}
customElements.define('header-component', Header);