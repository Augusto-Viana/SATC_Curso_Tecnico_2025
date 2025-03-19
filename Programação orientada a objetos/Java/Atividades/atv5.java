package Atividades;
//Os gestores da sua empresa resolveram dar um aumento de salário aos seus colaboradores e lhe contrataram para desenvolver o programa que calcula os reajustes. Portanto, faça um programa que recebe o salário de um colaborador e o reajuste segundo o seguinte critério, baseado no salário atual:
//Salários até R$ 280,00 (incluindo), receberão aumento de 20%
//Salários entre R$ 280,00 e R$ 700,00 (incluindo), receberão aumento de 15%
//Salários entre R$ 700,00 e R$ 1500,00 (incluindo), receberão aumento de 10%
//Salários de R$ 1500,00 em diante, receberão aumento de 5% 

//Após o aumento ser realizado, informe na tela:
//O salário antes do reajuste;
//O percentual de aumento aplicado;
//O valor do aumento;
//O novo salário, após o aumento;

import java.util.Scanner;

public class atv5 {
    public static void main(String[] args) {
        Scanner entrada = new Scanner(System.in);
        
        System.out.print("Cálculo de salário\n\n");

        System.out.print("Insira o valor do seu salário: \n\n");
        double valor = entrada.nextDouble();

        if (valor <= 280 && valor > 0) {
            double salario1 = valor * 1.20;
            System.out.print("O valor do salário é menor que R$ 280, por isso recebeu um aumento de 20%\nValor antigo: " + valor + "\nValor com aumento: " + salario1);
        }
        else if (valor > 280 && valor >= 700) {
            double salario2 = valor * 1.15;
            System.out.print("O valor do salário fica entre R$ 281 e R$ 700, por isso recebeu um aumento de 15%\nValor antigo: " + valor + "\nValor com aumento: " + salario2);
        }
        else if (valor > 700 && valor >= 1500) {
            double salario3 = valor * 1.10;
            System.out.print("O valor do salário fica entre R$ 701 e R$ 1500, por isso recebeu um aumento de 15%\nValor antigo: " + valor + "\nValor com aumento: " + salario3);
        }
        else if (valor > 1500) {
            double salario4 = valor * 1.05;
            System.out.print("O valor do salário é maior que R$ 1500, por isso recebeu um aumento de 5%\nValor antigo: " + valor + "\nValor com aumento: " + salario4);
        }
        entrada.close();
    }
}