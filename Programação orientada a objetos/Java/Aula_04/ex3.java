package Aula_04;

import java.util.Scanner;

public class ex3 {
    public static void main(String[] args) {
        IMC();
        System.exit(0);
    }

    public static void IMC() {
        Scanner entrada = new Scanner(System.in);
        int abx = 0; //Declaração de variáveis.
        int nor = 0;
        int aci = 0;
        int obe = 0;

        System.out.print("Digite a quantidade de entrevistados: ");
        int entrevistados = entrada.nextInt();

        for (int i = 0; i < entrevistados; i++) {  //Estrutura de repetição para coletar os dados:

            String buffer = entrada.nextLine();

            System.out.print("Digite o seu nome: ");
            String nome = entrada.nextLine();

            System.out.print(nome + ", digite o seu peso: ");
            Double peso = entrada.nextDouble();

            System.out.print(nome + ", digite a sua altura: ");
            Double altura = entrada.nextDouble();

            Double imc = peso / (altura * altura);

            if (imc < 18) { //Estrutura de condição para adicionar os contadores.
                abx++;
            } else if (imc >= 18 && imc <= 25) {
                nor++;
            } else if (imc >= 26 && imc <= 30) {
                aci++;
            } else if (imc > 30) {
                obe++;
            }
            
        }
        System.out.println("Total de entrevistados: ");

        System.out.println("Abaixo do peso: " + abx + " pessoa(s).");
        System.out.println("Peso normal: " + nor + " pessoa(s).");
        System.out.println("Acima do peso: " + aci + " pessoa(s).");
        System.out.println("Obeso(a): " + obe + " pessoa(s).");
        entrada.close();
    }
}
