pipeline {
    agent any

    environment {
        COMPOSE_FILE = 'docker-compose.yml'
    }

    stages {
        stage('Preparation') {
            steps {
                echo '✅ Repository checked out by Jenkins.'
                sh 'ls -la'
            }
        }

        stage('Build and Deploy') {
            steps {
                echo '📦 Shutting down any existing containers...'
                sh 'docker-compose down || true'

                echo '🚀 Starting containers using docker-compose...'
                sh 'docker-compose up -d --build'
            }
        }
    }

    post {
        success {
            echo '✅ Application deployed successfully!'
        }
        failure {
            echo '❌ Build failed. Please check the error log.'
        }
    }
}
