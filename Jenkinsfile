pipeline {
    agent any

    environment {
        CONTAINER_NAME = 'project-copy2'
        CONTAINER_DIR = '/var/www/html/'
    }

    stages {
        stage('Checkout SCM') {
            steps {
                checkout scm
            }
        }

        stage('Clone Repository') {
            steps {
                script {
                    sh 'git clone https://github.com/Karthik123467/php-docker-stack-demo.git'
                }
            }
        }

        stage('Check and Start Container') {
            steps {
                script {
                    // Check if the container exists
                    def containerExists = sh(script: "docker ps -q -f name=${CONTAINER_NAME}", returnStdout: true).trim()
                    if (!containerExists) {
                        // Start the container if not running
                        echo "Starting container ${CONTAINER_NAME}"
                        sh "docker run -d --name ${CONTAINER_NAME} php:7.4-apache"
                    }
                }
            }
        }

        stage('Copy to Container') {
            steps {
                script {
                    // Ensure the target directory exists inside the container
                    sh "docker exec ${CONTAINER_NAME} mkdir -p ${CONTAINER_DIR}"
                    
                    // Archive the files excluding .git and previous tar.gz file
                    sh 'tar --warning=no-file-changed --exclude=.git --exclude=project.tar.gz -czf project.tar.gz .'

                    // Copy to the Docker container
                    sh "docker cp project.tar.gz ${CONTAINER_NAME}:${CONTAINER_DIR}"
                }
            }
        }

        stage('Docker Compose Up') {
            steps {
                script {
                    // Bring up the containers with docker-compose
                    sh 'docker-compose up -d'
                }
            }
        }

        stage('Run Tests or Wait') {
            steps {
                script {
                    echo 'Waiting for container to start or running tests...'
                }
            }
        }

        stage('Docker Compose Down') {
            steps {
                script {
                    // Stop the containers with docker-compose
                    sh 'docker-compose down'
                }
            }
        }
    }

    post {
        always {
            cleanWs()
        }
    }
}
