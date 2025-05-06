package aula12_veiculos;
import java.util.Scanner;

public class cadastrar {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        Oficina oficina = new Oficina();
        
        // Menu inicial para o usuário
        System.out.println("Escolha o tipo de veículo:");
        System.out.println("1. Automóvel");
        System.out.println("2. Bicicleta");
        System.out.print("Digite sua opção (1 ou 2): ");
        int opcao = scanner.nextInt();
        scanner.nextLine(); // Consumir a nova linha após o número
        
        // Variável para armazenar o veículo escolhido
        veiculo veiculoEscolhido = null;

        // Pedir informações do veículo (Código, Descrição, Marca e Modelo)
        System.out.print("Digite o código do veículo: ");
        String codigo = scanner.nextLine();
        System.out.print("Digite a descrição do veículo: ");
        String descricao = scanner.nextLine();
        System.out.print("Digite a marca do veículo: ");
        String marca = scanner.nextLine();
        System.out.print("Digite o modelo do veículo: ");
        String modelo = scanner.nextLine();
        
        // Decisão baseada na opção do usuário
        if (opcao == 1) {
            veiculoEscolhido = new automovel(codigo, descricao, marca, modelo);
            System.out.println("\nVocê escolheu um Automóvel.");
        } else if (opcao == 2) {
            veiculoEscolhido = new bicicleta(codigo, descricao, marca, modelo);
            System.out.println("\nVocê escolheu uma Bicicleta.");
        } else {
            System.out.println("Opção inválida! O programa será encerrado.");
            return; // Encerra a execução
        }
               
        veiculoEscolhido.exibirInformacoes();
        
        System.out.println("\nIniciando os serviços para o veículo escolhido...");
        oficina.realizarServico(veiculoEscolhido);
        
        scanner.close();
    }
}