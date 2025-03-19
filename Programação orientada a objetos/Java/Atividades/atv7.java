package Atividades;
//Um posto está vendendo combustíveis com a seguinte tabela de descontos: Álcool:
//até 20 litros, desconto de 3% por litro
//acima de 20 litros, desconto de 5% por litro Gasolina:
//até 20 litros, desconto de 4% por litro
//acima de 20 litros, desconto de 6% por litro

//Escreva um programa que leia o número de litros vendidos, o tipo de combustível (codificado da seguinte forma: A-álcool, G-gasolina), calcule e imprima o valor a ser pago pelo cliente sabendo-se que o preço do litro da gasolina é R$ 2,50 e o preço do litro do álcool é R$ 1,90.

import java.util.Scanner;

public class atv7 {
	public static void main(String[] args) {
		Scanner entrada = new Scanner(System.in);
		System.out.print("Tabela de combustíveis:\n\nPreço por litro:\nGasolina - R$2.50\nÁlcool - R$1.90\n"); 

		System.out.print("Qual vai ser o tipo de combustível?\n1 - Gasolina\n2 - Álcool\n: ");
		double tipo = entrada.nextDouble();

		System.out.print("Digite a quantidade de litros: ");
		double litros = entrada.nextDouble();

		if (tipo == 1) {
			if (litros <= 20 && litros > 0) {
				double gasolina = litros * 2.50 - (litros * (0.04 * 2.50));
				System.out.print("Menos de 20 litros foram abastecidos, por isso, um total de 4% de desconto por litro foi aplicado.\nValor a pagar: " + gasolina);
			}
			else if (litros > 20) {
				double gasolina = litros * 2.50 - (litros * (0.06 * 2.50));
				System.out.print("Mais de 20 litros foram abastecidos, por isso, um total de 6% de desconto por litro foi aplicado.\nValor a pagar: " + gasolina);
			}
		}
		else if (tipo == 2) {
			if (litros <= 20 && litros > 0) {
				double gasolina = litros * 1.90 - (litros * (0.03 * 1.90));
				System.out.print("Menos de 20 litros foram abastecidos, por isso, um total de 3% de desconto por litro foi aplicado.\nValor a pagar: " + gasolina);
			}
			else if (litros > 20) {
				double gasolina = litros * 1.90 - (litros * (0.05 * 1.90));
				System.out.print("Mais de 20 litros foram abastecidos, por isso, um total de 5% de desconto por litro foi aplicado.\nValor a pagar: " + gasolina);
			}
		}
		else {
			System.out.print("Algo deu errado! Tente novamente.");
		}

		entrada.close();
		
	}
}