pipeline {
    agent any

    environment {
        COMPOSE_FILE = 'docker-compose.yml'
    }

    stages {
        stage('Checkout SCM') {
            steps {
                // Explicitly define the branch to checkout
                git branch: 'main', url: 'https://github.com/Karthik123467/php-docker-stack-demo.git'
            }
        }
        
        stage('Build Docker Images') {
            steps {
                bat 'docker-compose -f %COMPOSE_FILE% down'  // Stop containers if already running
                bat 'docker-compose -f %COMPOSE_FILE% up -d'  // Start containers in detached mode
            }
        }

        stage('Verify Containers') {
            steps {
                bat 'docker ps'
            }
        }

        stage('Cleanup') {
            steps {
                bat 'docker-compose -f %COMPOSE_FILE% down'
            }
        }
    }

    post {
        success {
            echo 'Deployment was successful!'
        }
        failure {
            echo 'Deployment failed.'
        }
    }
}
