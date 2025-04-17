pipeline {
    agent any

    environment {
        COMPOSE_PROJECT_NAME = 'phpstack'
    }

    stages {
        stage('Checkout Code') {
            steps {
                checkout scm
            }
        }

        stage('Build & Start Services') {
            steps {
                script {
                    if (isUnix()) {
                        sh 'docker-compose down'
                        sh 'docker-compose build'
                        sh 'docker-compose up -d'
                    } else {
                        bat 'docker-compose down'
                        bat 'docker-compose build'
                        bat 'docker-compose up -d'
                    }
                }
            }
        }

        stage('Verify App') {
            steps {
                script {
                    if (isUnix()) {
                        sh 'docker ps'
                    } else {
                        bat 'docker ps'
                    }
                }
            }
        }
    }

    post {
        always {
            echo 'Pipeline completed.'
        }
        success {
            echo 'App deployed successfully!'
        }
        failure {
            echo 'Pipeline failed.'
        }
    }
}
