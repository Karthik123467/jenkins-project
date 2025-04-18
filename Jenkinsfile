pipeline {
    agent any

    environment {
        COMPOSE_PROJECT_NAME = "php-docker-stack-demo"
    }

    stages {
        stage('Clone Repository') {
            steps {
                git 'https://github.com/Karthik123467/php-docker-stack-demo.git'
            }
        }

        stage('Stop Existing Containers (if any)') {
            steps {
                script {
                    sh 'docker-compose down || true'
                }
            }
        }

        stage('Build and Run Containers') {
            steps {
                sh 'docker-compose up -d --build'
            }
        }

        stage('Show Running Containers') {
            steps {
                sh 'docker ps'
            }
        }
    }

    post {
        success {
            echo 'Deployment successful! Visit:'
            echo 'http://localhost:8081 => index.php'
            echo 'http://localhost:8001 => phpMyAdmin'
        }
        failure {
            echo 'Deployment failed.'
        }
    }
}






