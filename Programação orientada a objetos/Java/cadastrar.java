package aula12_veiculos;
import java.util.Scanner;

public class cadastrar {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        Oficina oficina = new Oficina();
        
        // Menu inicial para o usu�rio
        System.out.println("Escolha o tipo de ve�culo:");
        System.out.println("1. Autom�vel");
        System.out.println("2. Bicicleta");
        System.out.print("Digite sua op��o (1 ou 2): ");
        int opcao = scanner.nextInt();
        scanner.nextLine(); // Consumir a nova linha ap�s o n�mero
        
        // Vari�vel para armazenar o ve�culo escolhido
        veiculo veiculoEscolhido = null;

        // Pedir informa��es do ve�culo (C�digo, Descri��o, Marca e Modelo)
        System.out.print("Digite o c�digo do ve�culo: ");
        String codigo = scanner.nextLine();
        System.out.print("Digite a descri��o do ve�culo: ");
        String descricao = scanner.nextLine();
        System.out.print("Digite a marca do ve�culo: ");
        String marca = scanner.nextLine();
        System.out.print("Digite o modelo do ve�culo: ");
        String modelo = scanner.nextLine();
        
        // Decis�o baseada na op��o do usu�rio
        if (opcao == 1) {
            veiculoEscolhido = new automovel(codigo, descricao, marca, modelo);
            System.out.println("\nVoc� escolheu um Autom�vel.");
        } else if (opcao == 2) {
            veiculoEscolhido = new bicicleta(codigo, descricao, marca, modelo);
            System.out.println("\nVoc� escolheu uma Bicicleta.");
        } else {
            System.out.println("Op��o inv�lida! O programa ser� encerrado.");
            return; // Encerra a execu��o
        }
               
        veiculoEscolhido.exibirInformacoes();
        
        System.out.println("\nIniciando os servi�os para o ve�culo escolhido...");
        oficina.realizarServico(veiculoEscolhido);
        
        scanner.close();
    }
}