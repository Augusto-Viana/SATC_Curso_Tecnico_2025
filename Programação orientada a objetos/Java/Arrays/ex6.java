package Arrays;

//Construir um programa JAVA que contenha um método que leia dois array A e B com 10 elementos inteiros. Após, gerar um novo array C resultante da soma dos elementos do array A + B.

import java.util.Scanner;

public class ex6 {
    
    public static int[] Read(int size) {
        Scanner scanner = new Scanner(System.in);
        int[] array = new int[10];
        
        for (int i = 0; i < 10; i++) {
            System.out.print("Digite o elemento " + (i + 1) + ": ");
            array[i] = scanner.nextInt();
        }
        return array;
    }

    public static int[] Sum(int[] A, int[] B) {
        int[] C = new int[A.length];        
        for (int i = 0; i < A.length; i++) {
            C[i] = A[i] + B[i]; 
        }
        return C;
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Digite os elementos do array A:");
        int[] A = Read(10);
        System.out.println("Digite os elementos do array B:");
        int[] B = Read(10);

        int[] C = Sum(A, B);

        System.out.println("Os elementos do array C são:");
        for (int i = 0; i < C.length; i++) {
            System.out.print(C[i] + " ");
        }
        scanner.close();
    }
}