package Superclasses.Oficina;

import java.util.Scanner;

class Veiculos {
    protected int codigo;
    protected int ano;
    protected String descricao;
    protected String marca;
    protected String modelo;
    protected String cor;
    protected float tamanho;
    protected float peso;

    //CheckList
    protected int mes;
    protected int dia;
    protected int hora;

    //Ajuste

    public Veiculos(int codigo, int ano, String descricao, String marca, String modelo, String cor, float tamanho, float peso) {
        this.codigo = codigo;
        this.ano = ano;
        this.descricao = descricao;
        this.marca = marca;
        this.modelo = modelo;
        this.cor = cor;
        this.tamanho = tamanho;
        this.peso = peso;
    }

    public int getCodigo() {
        return codigo;
    }
    public int getAno() {
        return ano;
    }
    public String getDescricao() {
        return descricao;
    }
    public String getMarca() {
        return marca;
    }
    public String getModelo() {
        return modelo;
    }
    public String getCor() {
        return cor;
    }
    public float getTamanho() {
        return tamanho;
    }
    public float getPeso() {
        return peso;
    }

    public void checkList() {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Informe a data do checklist: ");
        String data = scanner.nextLine();

        System.out.println("Informe o horário do checklist: ");
        String hora = scanner.nextLine();

        scanner.close();
    }

    public void adjust() {
        System.out.println("Dando um trato maroto no veículo...");
    }

    public void cleanup() {
        System.out.println("Dando uma limpadinha e terminando com uma lustrada...");
    }

    public void refill() {
        System.out.print("placeholder");
    }


    public void info() {
        System.out.println("Código: " + codigo);
        System.out.println("Ano: " + ano);
        System.out.println("Descrição: " + descricao);
        System.out.println("Marca: " + marca);
        System.out.println("Modelo: " + modelo);
        System.out.println("Cor: " + cor);
        System.out.println("Tamanho: " + tamanho);
        System.out.println("Peso: " + peso);
    }

}

class Checkup {
    public void checkList(Veiculos Veiculos) {
        Veiculos.checkList();
    }
    public void ajuste(Veiculos Veiculos) {
        Veiculos.adjust();
    }
    public void limpeza(Veiculos Veiculos) {
        Veiculos.cleanup();
    }
    public void abastecimento(Veiculos Veiculos) {
        Veiculos.refill();
    }
}

class Carro extends Veiculos {
    private String combustivel;

    public Carro(int codigo, int ano, String descricao, String marca, String modelo, String cor, float tamanho, float peso, String combustivel) {
        super(codigo, ano, descricao, marca, modelo, cor, tamanho, peso);
        this.combustivel = combustivel;
    }

    @Override 
    public void info() {
        super.info();
        System.out.println("Tipo de combustível: " + combustivel);
    }
}

class Caminhao extends Veiculos {
    private String carga;

    public Caminhao(int codigo, int ano, String descricao, String marca, String modelo, String cor, float tamanho, float peso, String carga) {
        super(codigo, ano, descricao, marca, modelo, cor, tamanho, peso);
        this.carga = carga;
    }

    @Override 
    public void info() {
        super.info();
        System.out.println("Capacidade de carga: " + carga);
    }
}

class Bicicleta extends Veiculos {
    private String farol;

    public Bicicleta(int codigo, int ano, String descricao, String marca, String modelo, String cor, float tamanho, float peso, String farol) {
        super(codigo, ano, descricao, marca, modelo, cor, tamanho, peso);
        this.farol = farol;
    }

    @Override 
    public void info() {
        super.info();
        System.out.println("Tem farol: " + farol);
    }
}

public class Oficina {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        Checkup checkup = new Checkup();

        System.out.println("Escolha o tipo de veículo: ");
        System.out.println("1 - Carro");
        System.out.println("2 - Caminhão");
        System.out.println("3 - Bicicleta");

        int escolha = scanner.nextInt();
        scanner.nextLine();

        Veiculos selecionado = null;

        System.out.print("Informe o código do veículo: ");
        int codigo = scanner.nextInt();
        scanner.nextLine();

        System.out.print("Informe o ano do veículo: ");
        int ano = scanner.nextInt();
        scanner.nextLine();

        System.out.print("De uma breve descrição sobre o veículo: ");
        String descricao = scanner.nextLine();

        System.out.print("Informe a marca do veículo: ");
        String marca = scanner.nextLine();

        System.out.print("Informe o modelo do veículo: ");
        String modelo = scanner.nextLine();

        System.out.print("Informe a cor do veículo: ");
        String cor = scanner.nextLine();

        System.out.print("Informe o tamanho(comprimento) do veículo(em metros): ");
        float tamanho = scanner.nextFloat();
        scanner.nextLine();

        System.out.print("Informe o peso(em toneladas ou quilos) do veículo: ");
        float peso = scanner.nextFloat();
        scanner.nextLine();

        if (escolha == 1) {
            System.out.print("Tipo de combustível: ");
            String combustivel = scanner.nextLine();

            selecionado = new Carro(codigo, ano, descricao, marca, modelo, cor, tamanho, peso, combustivel);
        } else if (escolha == 2) {
            System.out.print("Capacidade de carga: ");
            String carga = scanner.nextLine();

            selecionado = new Caminhao(codigo, ano, descricao, marca, modelo, cor, tamanho, peso, carga);
        } else if (escolha == 3) {
            System.out.print("Tem farol: ");
            String farol = scanner.nextLine();

            selecionado = new Bicicleta(codigo, ano, descricao, marca, modelo, cor, tamanho, peso, farol);
        } else {
            System.out.println("Opção inválida.");
        }

        System.out.println("Qual é o tipo de serviço que você deseja: ");
        System.out.println("1 - Checklist");
        System.out.println("2 - Ajuste/Conserto");
        System.out.println("3 - Limpeza");
        int servico = scanner.nextInt();

        if (servico == 1) {
            checkup.checkList(selecionado);
        }
        else if (servico == 2) {
            checkup.ajuste(selecionado);
        }
        else if (servico == 3) {
            checkup.limpeza(selecionado);
        }
        else {
            System.out.println("Serviço inválido.");
        }

        System.out.println("\n=== Informações do veículo ===");

        scanner.close();
    }
}