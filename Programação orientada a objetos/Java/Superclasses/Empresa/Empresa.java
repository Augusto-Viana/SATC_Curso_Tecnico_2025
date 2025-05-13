package Superclasses.Empresa;

import java.util.Scanner;

 class Funcionarios {
    protected int codigo;
    protected String nome;
    protected String sexo;
    protected int horas;
    protected float valor;

    public Funcionarios(int codigo, String nome, String sexo, int horas, float valor) {
        this.codigo = codigo;
        this.nome = nome;
        this.sexo = sexo;
        this.horas = horas;
        this.valor = valor;
    }

    public int getCodigo() {
        return codigo;
    }
    public String getNome() {
        return nome;
    }
    public String getSexo() {
        return sexo;
    }
    public int getHoras() {
        return horas;
    }
    public float getValor() {
        return valor;
    }

    public void info() {
        System.out.println("Código: " + codigo);
        System.out.println("Nome: " + nome);
        System.out.println("Sexo: " + sexo);
        System.out.println("Horas de trabalho: " + horas);
        System.out.println("Valor por hora: " + valor);
    }
}

class Engenheiro extends Funcionarios {
    private int crea;
    private String especializacao;

    public Engenheiro(int codigo, String nome, String sexo, int horas, float valor, int crea, String especializacao) {
        super(codigo, nome, sexo, horas, valor);
        this.crea = crea;
        this.especializacao = especializacao;
    }

    @Override 
    public void info() {
        super.info();
        System.out.println("Número da CREA: " + crea);
        System.out.println("Especialização: " + especializacao);
    }
}

class Diretor extends Funcionarios {
    private String area;

    public Diretor(int codigo, String nome, String sexo, int horas, float valor, String area) {
        super(codigo, nome, sexo, horas, valor);
        this.area = area;
    }

    @Override 
    public void info() {
        super.info();
        System.out.println("Área de gestão: " + area);
    }
}

class Secretario extends Funcionarios {
    private String setor;
    private String categoria;

    public Secretario(int codigo, String nome, String sexo, int horas, float valor, String setor, String categoria) {
        super(codigo, nome, sexo, horas, valor);
        this.setor = setor;
        this.categoria = categoria;

    }

    @Override 
    public void info() {
        super.info();
        System.out.println("Setor: " + setor);
        System.out.println("Categoria: " + categoria);
    }
}

class Gerente extends Funcionarios {
    private String setor;

    public Gerente(int codigo, String nome, String sexo, int horas, float valor, String setor) {
        super(codigo, nome, sexo, horas, valor);
        this.setor = setor;

    }

    @Override 
    public void info() {
        super.info();
        System.out.println("Setor: " + setor);
    }
}

public class Empresa {
    private static void calculo(int horas, float valor, int escolha) {

        double salario = horas * valor;
    
        if(escolha == 1 || escolha == 4) {
            salario *= 1.05;
        } else if(escolha == 2 || escolha == 3) {
            salario *= 1.02;
        } else {
            System.out.println("Erro!");
        }
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Escolha o tipo de cargo: ");
        System.out.println("1 - Engenheiro");
        System.out.println("2 - Diretor");
        System.out.println("3 - Secretário");
        System.out.println("4 - Gerente");

        int escolha = scanner.nextInt();
        scanner.nextLine();

        Funcionarios select = null;

        System.out.print("Informe o código do funcionário: ");
        int codigo = scanner.nextInt();
        scanner.nextLine();

        System.out.print("Informe o nome do funcionário: ");
        String nome = scanner.nextLine();

        System.out.print("Informe o sexo do funcionário: ");
        String sexo = scanner.nextLine();

        System.out.print("Informe a quantidade de horas trabalhadas: ");
        int horas = scanner.nextInt();
        scanner.nextLine();

        System.out.print("Informe o valor por hora trabalhada: ");
        float valor = scanner.nextFloat();
        scanner.nextLine();

        if (escolha == 1) {
            System.out.print("Número de CREA: ");
            int crea = scanner.nextInt();
            scanner.nextLine();
            System.out.print("Especialização: ");
            String especializacao = scanner.nextLine();

            select = new Engenheiro(codigo, nome, sexo, horas, valor, crea, especializacao);
            Engenheiro.info();
        } else if (escolha == 2) {
            System.out.print("Área de gestão: ");
            String area = scanner.nextLine();

            select = new Diretor(codigo, nome, sexo, horas, valor, area);
        } else if (escolha == 3) {
            System.out.print("Setor: ");
            String setor = scanner.nextLine();
            System.out.print("Categoria: ");
            String categoria = scanner.nextLine();

            select = new Secretario(codigo, nome, sexo, horas, valor, setor, categoria);
        } else if (escolha == 4) {
            System.out.print("Setor: ");
            String setor = scanner.nextLine();

            select = new Gerente(codigo, nome, sexo, horas, valor, setor);
        } else {
            System.out.println("Opção inválida.");
        } 

        scanner.close();
    }
}