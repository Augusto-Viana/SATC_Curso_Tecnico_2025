package Arrays;

//Uma indústria deseja controlar as temperaturas de uma máquina. Considere o problema de registrar as temperaturas diárias de uma máquina, correspondente ao ano (365 dias) de operação da máquina. O valor de cada dia é armazenado em uma variável interna a uma estrutura array conhecida pela variável-apontador temperatura. 

import java.util.Scanner;

public class ex1 {
    public static void main(String [] args) {
        double[] temperatures = new double[10];

        Scanner entrada = new Scanner(System.in);

        for(int i = 0; i < 10; i++) {
            System.out.print("Digite a temperatura: ");
            temperatures[i] = entrada.nextDouble();
        }

        for(int i = 0; i < 10; i++) {
            System.out.println("Temperaturas: " + temperatures[i]);
        }
        entrada.close();
    }
}