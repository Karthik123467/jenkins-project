pipeline {
    agent any
    
    environment {
        DOCKER_IMAGE_NAME = 'php-docker-stack-demo'
    }

    stages {
        stage('Checkout SCM') {
            steps {
                checkout scm
            }
        }

        stage('Build Docker Images') {
            steps {
                script {
                    // Check if the system is Unix-based or Windows-based and choose the appropriate command
                    if (isUnix()) {
                        sh 'docker build -t ${DOCKER_IMAGE_NAME} .'
                    } else {
                        bat 'docker build -t ${DOCKER_IMAGE_NAME} .'
                    }
                }
            }
        }

        stage('Verify Containers') {
            steps {
                script {
                    // Verify if the container is running (this is an example command, adjust as needed)
                    if (isUnix()) {
                        sh 'docker ps'
                    } else {
                        bat 'docker ps'
                    }
                }
            }
        }

        stage('Cleanup') {
            steps {
                script {
                    // Cleanup images after build (adjust as needed)
                    if (isUnix()) {
                        sh 'docker system prune -f'
                    } else {
                        bat 'docker system prune -f'
                    }
                }
            }
        }
    }

    post {
        always {
            echo 'Deployment finished.'
        }

        success {
            echo 'Deployment succeeded.'
        }

        failure {
            echo 'Deployment failed.'
        }
    }
}
