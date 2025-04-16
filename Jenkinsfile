pipeline {
    agent any

    environment {
        IMAGE_NAME = "php-demo-app"
        CONTAINER_NAME = "php-demo-container"
    }

    stages {
        stage('Clean Workspace') {
            steps {
                cleanWs() // Make sure no old files remain
            }
        }

        stage('Checkout Code') {
            steps {
                git branch: 'main', url: 'https://github.com/Karthik123467/jenkins-project'
            }
        }

        stage('Stop and Remove Old Containers') {
            steps {
                script {
                    echo "Stopping and removing old containers and volumes..."
                    bat "docker-compose down -v || echo No containers to stop"
                }
            }
        }

        stage('Build Docker Image (Force Rebuild)') {
            steps {
                script {
                    echo "Building Docker image with --no-cache..."
                    bat "docker-compose build --no-cache"
                }
            }
        }

        stage('Run App with Docker Compose') {
            steps {
                script {
                    echo "Running the app fresh..."
                    bat "docker-compose up -d"
                }
            }
        }

        stage('Verify') {
            steps {
                bat "docker-compose ps"
                bat "docker-compose logs --tail=20"
            }
        }
    }

    post {
        success {
            echo '✅ Deployment complete. Your updated index.php should be visible now.'
        }
        failure {
            echo '❌ Deployment failed!'
        }
    }
}
