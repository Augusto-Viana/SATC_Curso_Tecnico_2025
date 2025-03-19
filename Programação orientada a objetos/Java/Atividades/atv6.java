package Atividades;
//Faça um programa para o cálculo de uma folha de pagamento, sabendo que os descontos são do Imposto de Renda, que depende do salário bruto (conforme tabela abaixo) e 10% para o INSS e que o FGTS corresponde a 11% do Salário Bruto, mas não é descontado (é a empresa que deposita). O Salário Líquido corresponde ao Salário Bruto menos os descontos. O programa deverá pedir ao usuário o valor da sua hora e a quantidade de horas trabalhadas no mês. Desconto do IR:

//Salário Bruto até 900 (inclusive) - isento
//Salário Bruto até 1500 (inclusive) - desconto de 5%
//Salário Bruto até 2500 (inclusive) - desconto de 10%
//Salário Bruto acima de 2500 - desconto de 20%

//Mostrar na tela as informações, dispostas conforme o exemplo abaixo. No exemplo o valor da hora é 5 e a quantidade de hora é 220.

import java.util.Scanner;

public class atv6 {
    public static void main(String[] args) {
        Scanner entrada = new Scanner(System.in);

        System.out.print("Cálculo de imposto\n\n");

        System.out.print("Insira o valor do seu salário: \n\n");
        double valor = entrada.nextDouble();

        if (valor <= 900 && valor > 0) {
            System.out.print("O valor do salário é menor que R$ 901, por isso ficou isento de qualquer desconto.\nSalário líquido: " + valor);
        } else if (valor > 900 && valor >= 1500) {
            double salariol1 = valor * 0.95;
            System.out.print(
                    "O valor do salário fica entre R$ 901 e R$ 1500, por isso recebeu um desconto de 5%\nSalário bruto: " + valor + "\nSalário líquido: " + salariol1);
        } else if (valor > 1500 && valor >= 2500) {
            double salariol2 = valor * 0.90;
            System.out.print(
                    "O valor do salário fica entre R$ 1501 e R$ 2500, por isso recebeu um desconto de 10%\nSalário bruto: " + valor + "\nSálario líquido: " + salariol2);
        } else if (valor > 1500) {
            double salariol3 = valor * 0.85;
            System.out.print("O valor do salário é maior que R$ 2500, por isso recebeu um desconto de 15%\nSalário bruto: " + valor + "\nSalário líquido: " + salariol3);
        }
        entrada.close();
    }

}
